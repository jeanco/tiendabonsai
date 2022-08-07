<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Category;
use App\City;
use App\Company;
use App\Content;
use App\Etiquette;
use App\GalleryType;
use App\Http\Requests\ProductPromotionRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\PermissionUser;
use App\Place;
use App\Product;
use App\ProductPresentation;
use App\Uploaders\ImageUploader;
use App\Uploaders\PdfUploader;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller {
	protected $productDefaultImg;

	public function __construct() {
		$this->productDefaultImg = asset('static/images/product.png');
	}

	public function getViewProducts() {

		$user = Auth::user();
		$company_id = $user->company_id;
		$cities = City::all();

		$categories = Category::orderBy('id', 'ASC')
			->with(['products' => function ($query) use ($company_id) {
				$query->whereCompanyId($company_id);
				$query->select(['id', 'name', 'category_id', 'company_id']);
			}])
			->with(['subcategories' => function ($query) use ($company_id) {
				$query->with(['products' => function ($query) use ($company_id) {
					$query->whereCompanyId($company_id);
					$query->select(['id', 'name', 'subcategory_id', 'company_id']);
				}]);
			}])
			->get();

		$companies = Company::select(['id', 'name_company'])
			->get();

		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();

		$places = Place::all();
		$etiquettes = Etiquette::all();

		return view('admin.routers.products', ['categories' => $categories, 'companies' => $companies, 'cities' => $cities, 'permissions_array' => $permissions_array, 'gallery_types' => $gallery_types, 'places' => $places, 'etiquettes' => $etiquettes]);
	}

	public function get_products_list_view() {

		$categories = Category::orderBy('id', 'ASC')
			->whereHas('subcategories')
			->get();

		$gallery_types = GalleryType::all();
		$places = Place::all();

		$user = Auth::user();

		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$etiquettes = Etiquette::all();

		return view('admin.routers.products_list', compact('gallery_types', 'places', 'permissions_array', 'categories', 'etiquettes'));
	}

	public function get_config_presentation_view(Request $request) {

		$categories = Category::orderBy('id', 'DESC')
			->whereHas('subcategories')
			->wherePublished(1)
			->get();

		$gallery_types = GalleryType::all();
		$places = Place::all();

		$user = Auth::user();

		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$product_id = $request->product_id;

		$product = Product::select(['name', 'id', 'main_product_id', 'is_main_product', 'category_id', 'subcategory_id', 'description', 'features', 'specifications'])
			->find($product_id);

		$main_product_id = $product->main_product_id;
		if ($product->is_main_product) {
			$main_product_id = $product->id;
		}

		$main_product = Product::select(['name', 'id', 'code'])
			->find($main_product_id);

		#Color attributes
		$color_attributes = Attribute::whereHas('category_attribute', function ($query) {
			$query->whereSlug('color');
		})
			->wherePublished(1)
			->with(['color_presentations' => function ($query) use ($main_product_id) {
				$query->whereMainProductId($main_product_id);
			}])
			->get();
		#Size attributes
		$size_attributes = Attribute::whereHas('category_attribute', function ($query) {
			$query->whereSlug('talla');
		})
			->wherePublished(1)
			->with(['size_presentations' => function ($query) use ($main_product_id) {
				$query->whereMainProductId($main_product_id);
			}])
			->get();

		$presentations = ProductPresentation::whereMainProductId($product->main_product_id)
			->with('color')
			->with('size')
			->with(['product' => function ($query) {
				$query->select(['id', 'name', 'stock', 'price', 'price_promotion', 'promotion_available']);
			}])
			->get();

		return view('admin.routers.config_presentations', compact('gallery_types', 'places', 'permissions_array', 'categories', 'color_attributes', 'size_attributes', 'product', 'presentations', 'main_product_id', 'main_product'));
	}

	public function get_config_presentation_ecommerce_view(Request $request) {

		$categories = Category::orderBy('id', 'DESC')
			->whereHas('subcategories')
			->wherePublished(1)
			->get();

		$gallery_types = GalleryType::all();
		$places = Place::all();

		$user = Auth::user();

		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$product_id = $request->product_id;

		$product = Product::select(['name', 'id', 'main_product_id', 'is_main_product', 'category_id', 'subcategory_id', 'description', 'features', 'specifications'])
			->find($product_id);

		$main_product_id = $product->main_product_id;
		if ($product->is_main_product) {
			$main_product_id = $product->id;
		}

		$main_product = Product::select(['name', 'id', 'code'])
			->find($main_product_id);

		#Color attributes
		$color_attributes = Attribute::whereHas('category_attribute', function ($query) {
			$query->whereSlug('presentacion');
		})
			->wherePublished(1)
			->with(['color_presentations' => function ($query) use ($main_product_id) {
				$query->whereMainProductId($main_product_id);
			}])
			->get();
		#Size attributes
		// $size_attributes = Attribute::whereHas('category_attribute', function ($query) {
		// 	$query->whereSlug('talla');
		// })
		// 	->wherePublished(1)
		// 	->with(['size_presentations' => function ($query) use ($main_product_id) {
		// 		$query->whereMainProductId($main_product_id);
		// 	}])
		// 	->get();

		$presentations = ProductPresentation::whereMainProductId($main_product_id)
			->with('color')
			->with(['product' => function ($query) {
				$query->select(['id', 'name', 'stock', 'price', 'price_promotion', 'promotion_available']);
			}])
			->get();

		return view('admin.routers.config_presentations_ecommerce', compact('gallery_types', 'places', 'permissions_array', 'categories', 'color_attributes', 'product', 'presentations', 'main_product_id', 'main_product'));
	}


	public function postProduct(ProductRequest $request) {
		try {
			$data = $request->all();
			$product = new Product();
			$product->fill($data);
			$product->slug = str_slug($request->name, "-");
			$product->user_id = Auth::user()->id;
			$product->promotion_available = false;
			$product->price_promotion = 0;
			$product->published = 1;

			if ($request->hasFile('product_pdf')) {

				$pdf = $request->product_pdf;

				$functionUpload = new PdfUploader();
				$functionUpload->upload('/products/files', $pdf, 'pdf');

				$product->pdf = $functionUpload->getDropboxUrl();
				$product->pdf_path = $functionUpload->getDropboxPath();
			}

			if ($request->hasFile('brochure')) {

				$brochure = $request->brochure;

				$functionUpload = new PdfUploader();
				$functionUpload->upload('/products/files', $brochure, 'pdf');

				$product->brochure = $functionUpload->getDropboxUrl();
				$product->brochure_path = $functionUpload->getDropboxPath();
			}

			$product->save();
			return response()->json(['success' => true, 'product' => $product], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putProduct(ProductUpdateRequest $request) {
		try {
			$data = $request->all();
			$product = Product::find($request->product_id);
			$product->fill($data);
			$product->user_id = Auth::user()->id;
			$product->slug = str_slug($request->name, "-");

			if ($request->hasFile('product_pdf')) {

				$pdf = $request->product_pdf;
				$ext = $pdf->getClientOriginalExtension();

				$functionUpload = new PdfUploader();
				$functionUpload->delete($product->pdf_path, $product->pdf);
				$functionUpload->upload('/products/files', $pdf, $ext);

				$product->pdf = $functionUpload->getDropboxUrl();
				$product->pdf_path = $functionUpload->getDropboxPath();
			}

			if ($request->hasFile('brochure')) {

				$pdf = $request->brochure;
				$ext = $pdf->getClientOriginalExtension();

				$functionUpload = new PdfUploader();
				$functionUpload->delete($product->brochure_path, $product->brochure);
				$functionUpload->upload('/products/files', $pdf, $ext);

				$product->brochure = $functionUpload->getDropboxUrl();
				$product->brochure_path = $functionUpload->getDropboxPath();
			}

			$product->save();
			return response()->json(['success' => true, 'product' => $product], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function getProductById($productId) {
		$product = Product::find($productId);
		return response()->json(['product' => $product], 200);
	}

	public function getProductsByCategoryAndSubcategory($categoryId, $subcategoryId) {
		$products = Product::where('category_id', $categoryId)->where('subcategory_id', $subcategoryId)->orderBy('id', 'DESC')->get();
		if (count($products)) {
			foreach ($products as $i => $product) {
				$product->image = (count($img = $this->getOneRandomImage($product->id, 2, null)) ? $img->resource_thumb : $this->productDefaultImg);
			}
		}
		return response()->json(['products' => $products], 200);
	}

	public function searchProductByName($productName, $categoryId, $subcategoryId) {
		$products = Product::where('category_id', $categoryId)->where('subcategory_id', $subcategoryId)->where('name', 'LIKE', "%$productName%")->orderBy('id', 'DESC')->get();
		foreach ($products as $k => $product) {
			$product->image = (count($img = $this->getOneRandomImage($product->id, 2, null)) ? $img->resource_thumb : $this->productDefaultImg);
		}
		return response()->json(['products' => $products], 200);
	}

	public function deleteProduct(Request $request) {
		try {
			$product = Product::find($request->productId);
			//Detach all orders from the product
			// $product->orders()->detach();

			//Delete images
			$imagesContent = Content::where('model_id', $product->id)->where('model_type', 2)->where('type', 1)->get();

			$functionUpload = new ImageUploader();

			foreach ($imagesContent as $k => $content) {
				$functionUpload->delete($content->resource_path, $content->resource);
				$functionUpload->delete($content->resource_thumb_path, $content->resource_thumb);
				$content->delete();
			}

			//Delete pdf
			$functionUpload->delete($product->pdf_path, $product->pdf);
			$functionUpload->delete($product->brochure_path, $product->brochure);

			$product->delete();
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putProductPublished(Request $request) {
		try {
			$lastStatus = $request->lastStatus;

			$product = Product::find($request->productId);
			$product->published = ($lastStatus ? 0 : 1);
			$product->save();
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putProductPromotion(ProductPromotionRequest $request) {
		try {
			$product = Product::find($request->product_id);
			$product->price_promotion = $request->price_promotion;
			$product->promotion_available = 1;

			if ($request->hasFile('image')) {

				$img = $request->image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/products/promotions', $img, 'png', 1300);

				$content = new Content();
				$content->content = "product promotion";
				$content->resource = $functionUpload->getDropboxUrl();
				$content->resource_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/products/promotions/thumbs', $img, 'png', 200);
				$content->resource_thumb = $functionUpload->getDropboxUrl();
				$content->resource_thumb_path = $functionUpload->getDropboxPath();
				$content->model_id = $product->id;
				$content->model_type = 4;
				$content->type = 1;
				$content->save();
			}
			$product->save();
			return response()->json(['success' => true, 'name' => $product->name], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putProductRemovePromotion(Request $request) {
		try {
			$product = Product::find($request->productId);
			$product->promotion_available = 0;
			$product->price_promotion = 0;

			$content = Content::where('model_id', $product->id)->where('model_type', 4)->where('type', 1)->first();
			if (count($content)) {
				$functionUpload = new ImageUploader();
				$functionUpload->delete($content->resource_path, $content->resource);
				$functionUpload->delete($content->resource_thumb_path, $content->resource_thumb);
				$content->delete();
			}
			$product->save();

			return response()->json(['success' => true, 'name' => $product->name], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);

		}

	}

	public function postImages(Request $request) {
		$img = $request->file[0];

		$functionUpload = new ImageUploader();
		$functionUpload->upload('/products/images', $img, 'png', 900);

		$content = new Content();
		$content->content = "Img dropzone products";
		$content->resource = $functionUpload->getDropboxUrl();
		$content->resource_path = $functionUpload->getDropboxPath();

		$functionUpload->upload('/products/images/thumbs', $img, 'png', 450);
		$content->resource_thumb = $functionUpload->getDropboxUrl();
		$content->resource_thumb_path = $functionUpload->getDropboxPath();
		$content->model_id = 0;
		$content->model_type = 2;
		$content->type = 1;
		$content->save();

		return $content;
	}

	// Metodos api

	public function getPromotionalProducts() {
		$promotionalProducts = Product::select(['id', 'slug'])->where('promotion_available', 1)->get();
		$arrayPromotionalProducts = [];

		if (count($promotionalProducts)) {
			foreach ($promotionalProducts as $i => $product) {
				$arrayPromotionalProducts[$i]['slug'] = $product->slug;
				$arrayPromotionalProducts[$i]['imageUrl'] = (count($img = Content::where('model_id', $product->id)->where('model_type', 4)->where('type', 1)->first()) ? $img->resource : $this->productDefaultImg);
			}
		}
		return response()->json(['data' => $arrayPromotionalProducts], 200);
	}

	// Inventario
	public function getViewInventory() {

		$user = Auth::user();
		$company_id = $user->company_id;
		$cities = City::all();

		$categories = Category::orderBy('id', 'ASC')
			->with(['products' => function ($query) use ($company_id) {
				$query->whereCompanyId($company_id);
				$query->select(['id', 'name', 'category_id', 'company_id']);
			}])
			->with(['subcategories' => function ($query) use ($company_id) {
				$query->with(['products' => function ($query) use ($company_id) {
					$query->whereCompanyId($company_id);
					$query->select(['id', 'name', 'subcategory_id', 'company_id']);
				}]);
			}])
			->get();

		$companies = Company::select(['id', 'name_company'])
			->get();

		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();

		$places = Place::all();
		$etiquettes = Etiquette::all();

		return view('admin.routers.inventories', ['categories' => $categories, 'companies' => $companies, 'cities' => $cities, 'permissions_array' => $permissions_array, 'gallery_types' => $gallery_types, 'places' => $places, 'etiquettes' => $etiquettes]);
	}

	//Grilla de productos
	public function getViewProductsGrid() {

		$user = Auth::user();
		$company_id = $user->company_id;
		$cities = City::all();

		$categories = Category::orderBy('id', 'ASC')
			->with(['products' => function ($query) use ($company_id) {
				$query->whereCompanyId($company_id);
				$query->select(['id', 'name', 'category_id', 'company_id']);
			}])
			->with(['subcategories' => function ($query) use ($company_id) {
				$query->with(['products' => function ($query) use ($company_id) {
					$query->whereCompanyId($company_id);
					$query->select(['id', 'name', 'subcategory_id', 'company_id']);
				}]);
			}])
			->get();

		$companies = Company::select(['id', 'name_company'])
			->get();

		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereIn('slug', ['productos', 'categorias-de-productos', 'crud-de-productos', 'edicion-de-productos', 'pedidos', 'plantillas', 'suscripciones', 'menu-principal']);
				});
			})
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();

		$places = Place::all();
		$etiquettes = Etiquette::all();

		return view('admin.routers.products_grid', ['categories' => $categories, 'companies' => $companies, 'cities' => $cities, 'permissions_array' => $permissions_array, 'gallery_types' => $gallery_types, 'places' => $places, 'etiquettes' => $etiquettes]);
	}
}
