<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeProduct;
use App\Category;
use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Place;
use App\Price;
use App\Product;
use App\ProductPresentation;
use App\Subcategory;
use App\Uploaders\ImageUploader;
use App\Uploaders\PdfUploader;
use Auth;
use Carbon\Carbon;
use Datatables;
use DB;
use Excel;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function all() {
		$products = Product::with('random_image')->get();
		return $products;
	}

	public function show($id) {
		$product = Product::with('etiquettes')->find($id);
		$product->promotion_end_at_es_format = Carbon::parse($product->promotion_end_at)->format('d/m/Y');

		if ($product->transfer_end_at) {
			$product->transfer_end_at_es_format = Carbon::parse($product->transfer_end_at)->format('d/m/Y');
		}

		return $product;
	}

	public function datatable(Request $request) {
		$result = (new Product)->newQuery();

		$result = $result->whereColumn('products.id', '!=', 'products.main_product_id');
		
		$result->join('categories', 'products.category_id', '=', 'categories.id')
			->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id');

		if ($request->category_id != '') {
			$result->where('products.category_id', $request->category_id);

			if ($request->subcategory_id != '') {
				$result->where('products.subcategory_id', $request->subcategory_id);
			}
		}

		if ($request->promotion_available) {
			$result->where('products.promotion_available', $request->promotion_available);
		}

		if ($request->promotion_outstanding) {
			$result->where('products.outstanding_promotion', $request->promotion_outstanding);
		}

		$result->select('products.id as product_id',
			'products.code as code',
			'products.name as product_name',
			'categories.name as category_name',
			'subcategories.name as subcategory_name',
			'products.price as price',
			'products.stock as stock',
			'products.type_id as type',
			'products.published as product_published',
			'products.outstanding as product_outstanding',
			'products.promotion_available as promotion_available',
			'products.outstanding_promotion as outstanding_promotion');

		//return $result->get();

		// if ($request->status != '') {
		// 	$result = $result->where('orders.status', $request->status);
		// }

		// if ($request->start_date != '') {
		// 	$start_date = Carbon::createFromFormat('d/m/Y', $request->start_date);
		// 	$end_date = Carbon::createFromFormat('d/m/Y', $request->end_date);

		// 	$result = $result->whereDate('orders.created_at', '>=', $start_date)
		// 		->whereDate('orders.created_at', '<=', $end_date);
		// }

		return DataTables::of($result)
			->addColumn('Actions', function ($model) {

				return "actions";
			})->make(true);

	}

	public function getAttributes($product_id) {
		$product = Product::with('attributes')->find($product_id);
		return $product->attributes;
	}

	public function store(ProductCreateRequest $request) {

		$data = $request->all();
		$product = new Product();

		if (!isset($data['city_id'])) {
			$data['city_id'] = Auth::user()->city_id;
			$data['country_id'] = Auth::user()->country_id;
		}

		$product->fill($data);
		$product->slug = str_slug($data['name']);
		$product->user_id = Auth::user()->id;
		$product->promotion_available = false;
		$product->price_promotion = 0;
		$product->has_hidden_price = $data['has_hidden_price'] == 'true' ? 1 : 0;
		$product->published = 1;
		$product->company_id = Auth::user()->company_id;

		if ($request->hasFile('product_pdf')) {

			$pdf = $request->product_pdf;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/products/files', $pdf, $ext);

			$product->pdf = $functionUpload->getDropboxUrl();
			$product->pdf_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('brochure')) {

			$brochure = $request->brochure;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/products/files', $brochure, $ext);

			$product->brochure = $functionUpload->getDropboxUrl();
			$product->brochure_path = $functionUpload->getDropboxPath();
		}
		$product->save();

		$product->is_main_product = 1;
		$product->sku = $product->id;

		$product->save();

		$subcategory_id = $product->subcategory_id;

		$categories_attribute = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_id) {
			$query->whereHas('subcategories', function ($query) use ($subcategory_id) {
				$query->where('subcategories.id', $subcategory_id);
			});
		})
			->get();

		foreach ($categories_attribute as $i => $category) {
			$values = $request->input("values_category_$category->id");

			if ($values) {
				foreach ($values as $u => $attribute_id) {
					$product->attributes()->attach($attribute_id);
				}
			}
		}

		#Filling prices table
		$place = Place::first();

		$price = new Price();
		$price->name = "-";
		$price->type = 1;
		$price->price = $product->price;
		$price->min_quantity = 1;
		$price->status = true;
		$price->product_id = $product->id;
		$price->place_id = $place->id;
		$price->save();


		$product->etiquettes()->detach();

		if ($request->etiquettes) {
			$etiquettes_arr = explode(',', $request->etiquettes);

			$product->etiquettes()->attach($etiquettes_arr, ['subcategory_id' => $product->subcategory_id]);

		}

		return;
	}

	public function update($id, ProductUpdateRequest $request) {
		$data = $request->all();
		$product = Product::with('unit_price')->find($id);
		$product->fill($data);
		$product->has_hidden_price = $data['has_hidden_price'] == 'true' ? 1 : 0;
		$product->user_id = Auth::user()->id;
		$product->slug = str_slug($data['name']);

		if ($request->hasFile('product_pdf')) {

			$pdf = $request->product_pdf;
			$ext = $pdf->getClientOriginalExtension();

			$functionUpload = new PdfUploader();
			$functionUpload->upload('/products/files', $pdf, $ext);
			$functionUpload->delete($product->pdf_path, $product->pdf);

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


		$place = Place::first();

		$price = Price::where('product_id','=',$product->id)->where('deleted_at','=',null)->first();

		if (count($price)) {
			//dd($price[0]->id);
		$price->price = $product->price;
		$price->save();
		}
		

		// if ($product->unit_price) {
		// 	$product->unit_price->price = $product->price;
		// 	$product->unit_price->save();
		// }

		$subcategory_id = $product->subcategory_id;

		$categories_attribute = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_id) {
			$query->whereHas('subcategories', function ($query) use ($subcategory_id) {
				$query->where('subcategories.id', $subcategory_id);
			});
		})
			->get();

		$product->attributes()->detach();

		foreach ($categories_attribute as $i => $category) {
			$values = $request->input("values_category_$category->id");

			if ($values) {
				foreach ($values as $u => $attribute_id) {
					$product->attributes()->attach($attribute_id);
				}
			}
		}

		$product->etiquettes()->detach();

		if ($request->etiquettes) {
			$etiquettes_arr = explode(',', $request->etiquettes);

			$product->etiquettes()->attach($etiquettes_arr, ['subcategory_id' => $product->subcategory_id]);

		}
		return;
	}

	public function updatePublished($id) {
		$product = Product::find($id);

		$product->published = ($product->published == 1) ? 0 : 1;
		$product->save();
		return;
	}

	public function delete($id) {

		$product = Product::with('orders')
			->with('images')
			->find($id);

		if (count($product->orders)) {
			return response()->json(['message' => 'Este producto se encuentra en una orden.'], 400);
		}

		$functionUpload = new ImageUploader();

		$functionUpload->delete($product->image_thumb_path, $product->image_thumb);
		$functionUpload->delete($product->image_path, $product->image);

		$functionUpload->delete($product->promotion_image_path, $product->promotion_image);
		$functionUpload->delete($product->promotion_image_thumb_path, $product->promotion_image_thumb);

		$functionUpload->delete($product->promotion_label_image_path, $product->promotion_label_image);

		foreach ($product->images as $key => $image) {
			$functionUpload->delete($image->resource_thumb_path, $image->resource_thumb);
			$functionUpload->delete($image->resource_path, $image->resource);
			$image->delete();
		}

		$functionUpload->delete($product->pdf_path, $product->pdf);
		$functionUpload->delete($product->brochure_path, $product->brochure);
		$product->etiquettes()->detach();
		$product->attributes()->detach();

		if (!$product->is_main_product) {
			$products_related = Product::where('main_product_id', $product->main_product_id)
				->where('is_main_product', 0)
				->where('id', '!=', $product->id)
				->get();

			if (!count($products_related)) {
				$product_parent = Product::find($product->main_product_id);
				$product_parent->attributes()->detach();
				$product_parent->delete();
			}

			#deleting presentations;
			$presentations = ProductPresentation::whereProductId($product->id)
				->get();

			foreach ($presentations as $key => $presentation) {
				$presentation->delete();
			}
		}

		$product->delete();

		return;
	}

	public function getByCategoryAndSubcategory($cat_id, $sub_id) {
		$products = Product::where('category_id', $cat_id)
			->where('subcategory_id', $sub_id)
			->orderBy('id', 'DESC')
			->get();

		return $products;
	}

	public function storeImage(Request $request) {
		$img = $request->file[0];

		$functionUpload = new ImageUploader();
		$functionUpload->upload('/products/images', $img, 'png', 1200);

		$content = new Content();
		$content->content = "Product";
		$content->resource = $functionUpload->getDropboxUrl();
		$content->resource_path = $functionUpload->getDropboxPath();

		$functionUpload->upload('/products/images', $img, 'png', 700);
		$content->resource_thumb = $functionUpload->getDropboxUrl();
		$content->resource_thumb_path = $functionUpload->getDropboxPath();
		$content->model_id = 0;
		$content->model_type = 2;
		$content->type = 1;
		$content->save();

		return $content;
	}

	public function getImages($id, Request $request) {

		$gallery_type_id = $request->gallery_type_id;

		$product_ = Product::find($id);
		$main_id = $product_->id;
		$color_id = 0;

		
		if (!$product_->is_main_product) {
			$main_id = $product_->main_product_id;
			$presentation = ProductPresentation::whereProductId($product_->id)
					->where('main_product_id', $product_->main_product_id)
					->first();
			$color_id = $presentation->color_id;

		}

		$product = Product::with(['images' => function ($query) use ($gallery_type_id, $color_id) {
			$query->whereType($gallery_type_id);
			$query->whereColorId($color_id);
		}])
			->find($main_id);
		return $product->images;
	}

	public function search(Request $request) {
		$text = $request->q;

		$products = Product::with('random_image')
			->where('name', 'LIKE', "%$text%")
			->orderBy('id', 'DESC')
			->orWhere('promotion_title', 'LIKE', "%$text%")
			->with('random_image')
			->orderBy('id', 'DESC')
			->get();

		return $products;
	}

	public function updateOutstanding($id) {
		$product = Product::find($id);
		$product->outstanding = ($product->outstanding == 1) ? 0 : 1;
		$product->save();
		return;
	}

	public function get_prices($product_id, Request $request) {

		$prices = Price::whereProductId($product_id)
			->wherePlaceId($request->place_id)
			->get();

			


		return $prices;

	}

	public function export_excel(Request $request) {

		$category_id = $request->category_id;
		$subcategory_id = $request->subcategory_id;

		$attribute_categories = CategoryAttribute::all();
		$header_categories = [];

		foreach ($attribute_categories as $ac => $category) {
			$header_categories[] = $category->name;
		}

		$products = Product::orderBy('id', 'DESC')
			->with('category')
			->with('subcategory')
			->whereColumn('id', '!=', 'main_product_id');

		do {

			if ($subcategory_id) {
				$products->whereSubcategoryId($subcategory_id);
				break;
			}

			if ($category_id) {
				$products->whereCategoryId($category_id);
				break;
			}
		} while (false);

		$products = $products->get();

		$currentDate = Carbon::now()->format('d-m-Y');
		$excelName = "Lista de productos {$currentDate}";

		Excel::create($excelName, function ($excel) use ($products, $header_categories, $attribute_categories) {
			$excel->sheet('data', function ($sheet) use ($products, $header_categories, $attribute_categories) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray(array_merge(["#",
					"Código",
					"SKU",
					"Régimen",
					"Nombre del producto",
					"Descripción",
					"Precio Unitario",
					"Promocionado",
					"Precio promoción",
					"Stock",
					"Categoría",
					"Subcategoría",
					"Destacado",
					"Publicado",
				], $header_categories));

				foreach ($products as $key => $product) {

					$attributes = [];
					foreach ($attribute_categories as $acp => $category) {
						$exist_attribute_product = DB::table('attribute_product')
							->where('product_id', $product->id)
							->join('attributes', 'attribute_product.attribute_id', '=', 'attributes.id')
							->where('attributes.category_attribute_id', $category['id'])
							->get();

						if (count($exist_attribute_product)) {
							$attributes[] = $exist_attribute_product[0]->name;
						} else {
							$attributes[] = "";
						}
					}

					$sheet->row($key + 2,
						array_merge([$key + 1,
							$product->code,
							$product->sku,
							$this->product_type_name($product->type_id),
							$product->name,
							substr(strip_tags($product->description), 0, 100),
							$product->price,
							$product->promotion_available,
							$product->price_promotion,
							$product->stock,
							$product->category->name,
							$product->subcategory->name,
							$product->outstanding,
							$product->published,
						], $attributes));
				}
			});
		})->export('xls');

	}

	public function product_type_name($type) {

		if ($type === 1) {
			return "ZF";
		}

		if ($type === 2) {
			return "RG";
		}

	}

	public function product_type_id($type_name) {
		if ($type_name === "ZF") {
			return 1;
		}

		if ($type_name === "RG") {
			return 2;
		}

	}

	public function import_products(Request $request) {

		#Identifier
		$codes = $request->codes;

		$codes_counted = array_count_values($codes);

		$skus = $request->skus;
		#Values to create/update
		$names = $request->names;
		$descriptions = $request->descriptions;
		$prices = $request->prices;
		$promotion_availables = $request->promotion_availables;
		$price_promotions = $request->price_promotions;
		$stocks = $request->stocks;
		$categories = $request->categories;
		$subcategories = $request->subcategories;
		$outstandings = $request->outstandings;
		$publisheds = $request->publisheds;
		$hidden_price = $request->hidden_price;
		$message_about_price = $request->message_about_price;
		$types = $request->types;
		$left_columns = $request->left_columns;

		foreach ($skus as $key => $sku) {

			if ($sku) {
				#existe el sku -actualizar
				$product = Product::whereSku($sku)
					->first();

				if (count($product)) {
					#Filling!
					$product->name = $names[$key];
					$product->slug = str_slug($names[$key]);
					$product->minimum_quantity = 1;
					$product->description = $descriptions[$key];
					$product->price = $prices[$key];
					#create en prices_config;
					$product->promotion_available = $promotion_availables[$key];
					$product->price_promotion = $price_promotions[$key];
					$product->stock = $stocks[$key];

					$category_id = $this->validate_category($categories[$key]);
					$product->category_id = $category_id;
					$product->subcategory_id = $this->validate_subcategory($category_id, $subcategories[$key]);
					$product->outstanding = $outstandings[$key];
					$product->published = $publisheds[$key];
					$product->has_hidden_price = $hidden_price[$key];
					$product->message_about_price = $message_about_price[$key];

					$product->type_id = $this->product_type_id($types[$key]);
					$product->save();

					$this->set_price_x($product->id, $product->price);

					//$attributes_selected = $this->update_sku_name($product->id, $left_columns[$key], false, false);
					//$this->update_presentations($product->id, $product->main_product_id, $attributes_selected);
					//$product->attributes()->detach();
					//$product->attributes()->attach($attributes_selected[2]);
				} else {
					#sku no existe
					#no exist el sku - nuevo
					if (!$codes[$key]) {
						return response()->json(['message' => 'No hay sku ni code', 'producto' => $names[$key]], 400);
					}

					$main_product = Product::whereCode($codes[$key])->first();

					if (count($main_product)) {
						#Si existe , el product enviado es un hijo
						$product = new Product();
						$product->code = $codes[$key];
						$product->sku = $skus[$key];
						$product->name = $names[$key];
						$product->slug = str_slug($names[$key]);
						$product->minimum_quantity = 1;
						$product->description = $descriptions[$key];
						$product->price = $prices[$key];
						#create en prices_config;
						$product->promotion_available = $promotion_availables[$key];
						$product->price_promotion = $price_promotions[$key];
						$product->stock = $stocks[$key];

						$category_id = $this->validate_category($categories[$key]);
						$product->category_id = $category_id;
						$product->subcategory_id = $this->validate_subcategory($category_id, $subcategories[$key]);
						$product->outstanding = $outstandings[$key];
						$product->published = $publisheds[$key];
						$product->has_hidden_price = $hidden_price[$key];
						$product->message_about_price = $message_about_price[$key];
						$product->type_id = $this->product_type_id($types[$key]);
						$product->is_main_product = 0;
						$product->main_product_id = $main_product->id;
						$product->save();
						
						$this->set_price_x($product->id, $product->price);

						#crear en presentaciones
						$attributes_selected = $this->update_sku_name($product->id, $left_columns[$key], true, false);
						$this->update_presentations($product->id, $product->main_product_id, $attributes_selected);
						$product->attributes()->attach($attributes_selected[2]);

					} else {
						$product = new Product();
						$product->code = $codes[$key];
						$product->name = $names[$key];
						$product->sku = "";
						$product->slug = str_slug($names[$key]);
						$product->minimum_quantity = 1;
						$product->description = $descriptions[$key];
						$product->price = $prices[$key];
						#create en prices_config;
						$product->promotion_available = $promotion_availables[$key];
						$product->price_promotion = $price_promotions[$key];
						$product->stock = $stocks[$key];

						$category_id = $this->validate_category($categories[$key]);
						$product->category_id = $category_id;
						$product->subcategory_id = $this->validate_subcategory($category_id, $subcategories[$key]);
						$product->outstanding = $outstandings[$key];
						$product->published = $publisheds[$key];
						$product->has_hidden_price = $hidden_price[$key];
						$product->message_about_price = $message_about_price[$key];
						$product->type_id = $this->product_type_id($types[$key]);
						$product->is_main_product = 1;
						$product->main_product_id = 0;
						$product->save();

						$attributes_selected = $this->update_sku_name($product->id, $left_columns[$key], false, false);
						$product->attributes()->attach($attributes_selected[2]);

						//if ($codes_counted[$codes[$key]] == 1) {
						if (!($left_columns[$key][1]) || !($left_columns[$key][2])) {
							#Producto padre UNICO
							$product->sku = $skus[$key];
							$product->save();
							$this->set_price_x($product->id, $product->price);

						} else {
							$product_child = $product->replicate();
							$product_child->is_main_product = 0;
							$product_child->sku = $skus[$key];
							$product_child->main_product_id = $product->id;
							$product_child->save();

							#crear en presentaciones
							$attributes_selected = $this->update_sku_name($product_child->id, $left_columns[$key], true, false);
							$this->update_presentations($product_child->id, $product_child->main_product_id, $attributes_selected);
							$product_child->attributes()->attach($attributes_selected[2]);
							$this->set_price_x($product_child->id, $product_child->price);

							$product->main_product_id = $product->id;
							$product->sku = $product->id;
							$product->save();

							#Existe codigos repeditos, entonces son hijos. Crear padre e hijos
						}

					}

				}

			} else {
				#SKU vacio
				if (!$codes[$key]) {
					return response()->json(['message' => 'No hay sku ni code', 'producto' => $names[$key]], 400);
				}

				$main_product = Product::whereCode($codes[$key])->first();

				if (count($main_product)) {
					#Si existe , el product enviado es un hijo
					$product = new Product();
					$product->code = $codes[$key];
					$product->sku = "";
					$product->name = $names[$key];
					$product->slug = str_slug($names[$key]);
					$product->minimum_quantity = 1;
					$product->description = $descriptions[$key];
					$product->price = $prices[$key];
					#create en prices_config;
					$product->promotion_available = $promotion_availables[$key];
					$product->price_promotion = $price_promotions[$key];
					$product->stock = $stocks[$key];

					$category_id = $this->validate_category($categories[$key]);
					$product->category_id = $category_id;
					$product->subcategory_id = $this->validate_subcategory($category_id, $subcategories[$key]);
					$product->outstanding = $outstandings[$key];
					$product->published = $publisheds[$key];
					$product->has_hidden_price = $hidden_price[$key];
					$product->message_about_price = $message_about_price[$key];
					$product->type_id = $this->product_type_id($types[$key]);
					$product->is_main_product = 0;
					$product->main_product_id = $main_product->id;
					$product->save();

					$this->set_price_x($product->id, $product->price);

					#crear en presentaciones
					$attributes_selected = $this->update_sku_name($product->id, $left_columns[$key], true, true);
					$this->update_presentations($product->id, $product->main_product_id, $attributes_selected);
					$product->attributes()->attach($attributes_selected[2]);

				} else {
					$product = new Product();
					$product->code = $codes[$key];
					$product->name = $names[$key];
					$product->sku = "";
					$product->slug = str_slug($names[$key]);
					$product->minimum_quantity = 1;
					$product->description = $descriptions[$key];
					$product->price = $prices[$key];
					#create en prices_config;
					$product->promotion_available = $promotion_availables[$key];
					$product->price_promotion = $price_promotions[$key];
					$product->stock = $stocks[$key];

					$category_id = $this->validate_category($categories[$key]);
					$product->category_id = $category_id;
					$product->subcategory_id = $this->validate_subcategory($category_id, $subcategories[$key]);
					$product->outstanding = $outstandings[$key];
					$product->published = $publisheds[$key];
					$product->has_hidden_price = $hidden_price[$key];
					$product->message_about_price = $message_about_price[$key];
					$product->type_id = $this->product_type_id($types[$key]);
					$product->is_main_product = 1;
					$product->main_product_id = 0;
					$product->save();
					$attributes_selected = $this->update_sku_name($product->id, $left_columns[$key], false, false);
					$product->attributes()->attach($attributes_selected[2]);

					//if ($codes_counted[$codes[$key]] == 1) {
					if (!($left_columns[$key][1]) || !($left_columns[$key][2])) {
						#Producto padre UNICO
						$product->sku = $product->id;
						$product->save();
						$this->set_price_x($product->id, $product->price);

					} else {

						$product_child = $product->replicate();
						$product_child->is_main_product = 0;
						$product_child->sku = "";
						$product_child->main_product_id = $product->id;
						$product_child->save();
						$this->set_price_x($product_child->id, $product_child->price);

						#crear en presentaciones
						$attributes_selected = $this->update_sku_name($product_child->id, $left_columns[$key], true, true);
						$this->update_presentations($product_child->id, $product_child->main_product_id, $attributes_selected);
						$product_child->attributes()->attach($attributes_selected[2]);

						$product->main_product_id = $product->id;
						$product->save();

						#Existe codigos repeditos, entonces son hijos. Crear padre e hijos
					}

				}

			}

		}

		// foreach ($codes as $key => $code) {

		// 	$product = Product::whereCode($code)
		// 		->first();

		// 	if (count($product)) {
		// 		#exist

		// 	} else {
		// 		#not_exist
		// 		$product = new Product();
		// 		$product->code = $codes[$key];
		// 	}

		// 	#Filling!
		// 	$product->name = $names[$key];
		// 	$product->slug = str_slug($names[$key]);
		// 	$product->minimum_quantity = 1;
		// 	$product->description = $descriptions[$key];
		// 	$product->price = $prices[$key];
		// 	#create en prices_config;
		// 	$product->promotion_available = $promotion_availables[$key];
		// 	$product->price_promotion = $price_promotions[$key];
		// 	$product->stock = $stocks[$key];

		// 	$category_id = $this->validate_category($categories[$key]);
		// 	$product->category_id = $category_id;
		// 	$product->subcategory_id = $this->validate_subcategory($category_id, $subcategories[$key]);
		// 	$product->outstanding = $outstandings[$key];
		// 	$product->published = $publisheds[$key];
		// 	$product->type_id = $this->product_type_id($types[$key]);
		// 	$product->save();
		// }

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha importado'], 200);
	}

	public function set_price_x($product_id, $value)
	{

		$place = Place::first();

		$price = Price::whereProductId($product_id)
			->wherePlaceId($place->id)
			->first();

		if (count($price)) {
			$price->price = $value;
			$price->save();
			return;
		}

		$price = new Price();
		$price->name = "-";
		$price->type = 1;
		$price->price = $value;
		$price->min_quantity = 1;
		$price->status = true;
		$price->product_id = $product_id;
		$price->place_id = $place->id;
		$price->save();
		return;

	}

	public function update_presentations($product_id, $main_product_id, $attributes_selected) {
		#create o update
		$presentation = ProductPresentation::whereProductId($product_id)
			->whereMainProductId($main_product_id)
			->first();

		if (count($presentation)) {
			$presentation->color_id = $attributes_selected[0] ? $attributes_selected[0] : 0;
			$presentation->size_id = $attributes_selected[1] ? $attributes_selected[1] : 0;
			$presentation->save();
			return;
		}

		$new_presentation = new ProductPresentation();
		$new_presentation->product_id = $product_id;
		$new_presentation->main_product_id = $main_product_id;
		$new_presentation->color_id = $attributes_selected[0] ? $attributes_selected[0] : 0;
		$new_presentation->size_id = $attributes_selected[1] ? $attributes_selected[1] : 0;
		$new_presentation->save();
		return;

	}

	public function update_sku_name($product_id, $attributes, $update_name, $update_sku = true) {

		$product = Product::find($product_id);
		$main_product = Product::find($product->main_product_id);
		$attributes_id_array = [];
		$color_id = "";
		$size_id = "";
		$color_name = "";
		$size_name = "";

		foreach ($attributes as $key => $name) {

			$attr = Attribute::with('category_attribute')->whereSlug(str_slug($name))->first();

			if (count($attr)) {
				$attributes_id_array[] = $attr->id;
				if ($attr->category_attribute->slug == "color") {
					$color_sku = strtoupper(substr($attr->name, 0, 2));
					$color_name = $attr->name;
					$color_id = $attr->id;
				}
				if ($attr->category_attribute->slug == "talla") {
					$size_sku = strtoupper($attr->name);
					$size_name = $attr->name;
					$size_id = $attr->id;
				}
			}
		}

		if ($update_name) {
			$product->name = $main_product->name . " " . $color_name . " " . $size_name;
			$product->slug = str_slug($main_product->name . " " . $color_name . " " . $size_name);
			$product->save();
		}

		if ($update_sku) {
			$product->sku = $product->id . $color_sku . $size_sku;
			$product->save();
		}

		return [$color_id, $size_id, $attributes_id_array];

	}

	public function validate_category($category_name) {

		$category = Category::whereSlug(str_slug($category_name))
			->first();

		if (count($category)) {
			return $category->id;
		}

		##creating;

		$new_category = new Category();
		$new_category->name = $category_name;
		$new_category->slug = str_slug($category_name);
		$new_category->content = "";
		$new_category->published = 1;
		$new_category->save();

		return $new_category->id;

	}

	public function validate_subcategory($category_id, $subcategory_name) {

		$subcategory = Subcategory::whereSlug(str_slug($subcategory_name))
			->whereCategoryId($category_id)
			->first();
			
		if (count($subcategory)) {
			return $subcategory->id;
		}
		
		##creating;
		
		$new_subcategory = new Subcategory();
		$new_subcategory->name = $subcategory_name;
		$new_subcategory->slug = str_slug($subcategory_name);
		$new_subcategory->content = "";
		$new_subcategory->published = 1;
		$new_subcategory->category_id = $category_id;
		$new_subcategory->save();

		return $new_subcategory->id;
	}

	public function delete_promotion_image($product_id) {
		$product = Product::find($product_id);

		$functionUpload = new ImageUploader();
		$functionUpload->delete($product->promotion_image_path, $product->promotion_image);
		$functionUpload->delete($product->promotion_image_thumb_path, $product->promotion_image_thumb);

		$product->promotion_image = "";
		$product->promotion_image_path = "";
		$product->promotion_image_thumb = "";
		$product->promotion_image_thumb_path = "";
		$product->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la imagen promocional']);
	}

	public function delete_promotion_etiquette($product_id) {
		$product = Product::find($product_id);
		$functionUpload = new ImageUploader();
		$functionUpload->delete($product->promotion_label_image_path, $product->promotion_label_image);

		$product->promotion_label_image = "";
		$product->promotion_label_image_path = "";
		$product->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la etiqueta promocional']);

	}

	public function delete_transfer_etiquette($product_id) {
		$product = Product::find($product_id);


		// if (!$product->transfer_label_image_path) {
		// 	return response()->json(['title' => 'Ha o', 'message' => 'Se ha eliminado la etiqueta'], 400);

		// }

		$functionUpload = new ImageUploader();
		$functionUpload->delete($product->transfer_label_image_path, $product->transfer_label_image);

		$product->transfer_label_image = "";
		$product->transfer_label_image_path = "";
		$product->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la etiqueta']);

	}

	public function show_price($id) {
		$product = Product::find($id);
		return $product->price;
	}

	public function update_price($id, UpdatePriceRequest $request) {

		$product = Product::find($id);
		$product->price = $request->price;
		$product->save();
		return response()->json(['title' => '', 'message' => 'Se ha actualizado el precio.'], 200);
	}

	public function store_product_presentation(Request $request) {

		$main_product_id = $request->main_product_id;
		$main_product = Product::find($main_product_id);
		$main_product->main_product_id = $main_product->id;

		$main_product->category_id = $request->category_id;
		$main_product->subcategory_id = $request->subcategory_id;
		$main_product->description = $request->description;
		$main_product->code = $request->code;
		$main_product->features = $request->features;
		$main_product->specifications = $request->specifications;
		$main_product->name = $request->base_name;
		$main_product->slug = str_slug($request->base_name);
		$main_product->save();

		$product_id = $request->product_id;
		$color = $request->color;
		$size = $request->size;
		$price = $request->price;
		$stock = $request->stock;
		$price_promotion = $request->price_promotion;
		$promotion_available = $request->promotion_available;

		if ($product_id == "") {
			$product_id = [];
		} else {
			$main_product->main_product_id = $main_product->id;
			$main_product->save();
		}

		#deleting product_presentations that id is not inside product_id
		$presentations = ProductPresentation::whereMainProductId($main_product_id)
			->whereNotIn('product_id', $product_id)
			->with('product.images')
			->get();

		if (count($presentations)) {
			#deleting product_presentations & products & images
			foreach ($presentations as $key => $presentation) {
				$presentation->product->delete();
				$presentation->delete();
			}
		}

		foreach ($product_id as $key => $id) {

			$attribute_color = Attribute::find($color[$key]);
			$attribute_size = Attribute::find($size[$key]);

			if ($id != 0) {
				$product_from_db = Product::find($id);

				$product_from_db->name = $main_product->name . " " . $attribute_color->name . " " . $attribute_size->name;
				$product_from_db->slug = str_slug($main_product->name . " " . $attribute_color->name . " " . $attribute_size->name);
				$product_from_db->category_id = $request->category_id;
				$product_from_db->subcategory_id = $request->subcategory_id;
				$product_from_db->description = $request->description;
				$product_from_db->features = $request->features;
				$product_from_db->specifications = $request->specifications;

				$product_from_db->stock = $stock[$key];
				$product_from_db->price = $price[$key];
				$product_from_db->price_promotion = $price_promotion[$key];
				$product_from_db->promotion_available = $promotion_available[$key];
				$product_from_db->code = $request->code;

				$product_from_db->save();
				$product_from_db->sku = $product_from_db->id . strtoupper(substr($attribute_color->name, 0, 2)) . $attribute_size->name;
				$product_from_db->save();
			} else {
				$new_product = $main_product->replicate();
				$new_product->name = $main_product->name . " " . $attribute_color->name . " " . $attribute_size->name;

				$new_product->slug = str_slug($main_product->name . " " . $attribute_color->name . " " . $attribute_size->name);
				$new_product->stock = $stock[$key];
				$new_product->price = $price[$key];
				$new_product->price_promotion = $price_promotion[$key];
				$new_product->promotion_available = $promotion_available[$key];
				$new_product->main_product_id = $main_product_id;
				$new_product->is_main_product = false;
				$new_product->save();
				$new_product->sku = $new_product->id . strtoupper(substr($attribute_color->name, 0, 2)) . $attribute_size->name;
				$new_product->save();

				#attaching color/size
				$new_product->attributes()->attach([$color[$key], $size[$key]]);

				$new_presentation = new ProductPresentation();
				$new_presentation->product_id = $new_product->id;
				$new_presentation->main_product_id = $main_product_id;
				$new_presentation->color_id = $color[$key];
				$new_presentation->size_id = $size[$key];
				$new_presentation->save();
			}
		}

		return "ok";

	}

	public function store_product_presentation_ecommerce(Request $request) {

		$main_product_id = $request->main_product_id;
		$main_product = Product::find($main_product_id);
		$main_product->main_product_id = $main_product->id;

		$main_product->category_id = $request->category_id;
		$main_product->subcategory_id = $request->subcategory_id;
		$main_product->description = $request->description;
		$main_product->code = $request->code;
		$main_product->features = $request->features;
		$main_product->specifications = $request->specifications;
		$main_product->name = $request->base_name;
		$main_product->slug = str_slug($request->base_name);
		$main_product->save();



		$product_id = $request->product_id;
		$color = $request->color;
		//$size = $request->size;
		$price = $request->price;
		$stock = $request->stock;
		$price_promotion = $request->price_promotion;
		$promotion_available = $request->promotion_available;

		//actualizando los atributos del product main

		


		

		#deleting product_presentations 
		if (count($color)) {
			$product_attributes = DB::table('attribute_product')
							->where('product_id', $main_product_id)
							//->join('attributes', 'attribute_product.attribute_id', '=', 'attributes.id')
							->get();
			foreach ($product_attributes as $key => $value) {
				$main_product->attributes()->detach();
			}

		}

		foreach ($color as $key => $value) {
				$main_product->attributes()->attach([$value]);
		}
		///////

		if ($product_id == "") {
			$product_id = [];
		} else {
			$main_product->main_product_id = $main_product->id;
			$main_product->save();
		}

		#deleting product_presentations that id is not inside product_id
		$presentations = ProductPresentation::whereMainProductId($main_product_id)
			->whereNotIn('product_id', $product_id)
			->with('product.images')
			->get();

		if (count($presentations)) {
			#deleting product_presentations & products & images
			foreach ($presentations as $key => $presentation) {
				$presentation->product->delete();
				$presentation->delete();
			}
		}

		foreach ($product_id as $key => $id) {

			$attribute_color = Attribute::find($color[$key]);
			//$attribute_size = Attribute::find($size[$key]);

			if ($id != 0) {
				$product_from_db = Product::find($id);

				$product_from_db->name = $main_product->name . " " . $attribute_color->name;
				$product_from_db->slug = str_slug($main_product->name . " " . $attribute_color->name);
				$product_from_db->category_id = $request->category_id;
				$product_from_db->subcategory_id = $request->subcategory_id;
				$product_from_db->description = $request->description;
				$product_from_db->features = $request->features;
				$product_from_db->specifications = $request->specifications;

				$product_from_db->stock = $stock[$key];
				$product_from_db->price = $price[$key];
				$product_from_db->price_promotion = $price_promotion[$key];
				$product_from_db->promotion_available = $promotion_available[$key];
				$product_from_db->code = $request->code;

				$product_from_db->save();
				$product_from_db->sku = $product_from_db->id . $attribute_color->name;
				$product_from_db->save();
			} else {
				$new_product = $main_product->replicate();
				$new_product->name = $main_product->name . " " . $attribute_color->name;

				$new_product->slug = str_slug($main_product->name . " " . $attribute_color->name);
				$new_product->stock = $stock[$key];
				$new_product->price = $price[$key];
				$new_product->price_promotion = $price_promotion[$key];
				$new_product->promotion_available = $promotion_available[$key];
				$new_product->main_product_id = $main_product_id;
				$new_product->is_main_product = false;
				$new_product->save();
				$new_product->sku = $new_product->id . $attribute_color->name;
				$new_product->save();

				#attaching color/size
				$new_product->attributes()->attach([$color[$key]]);

				$new_presentation = new ProductPresentation();
				$new_presentation->product_id = $new_product->id;
				$new_presentation->main_product_id = $main_product_id;
				$new_presentation->color_id = $color[$key];
				$new_presentation->size_id = 0;
				$new_presentation->save();
			}
		}

		$product_presentations = Product::where('main_product_id', $main_product->id)
			->orderBy('price', 'ASC')
			->get();

		if (count($product_presentations)) {
			$main_product->price = $product_presentations[0]->price;
			$main_product->save();
		}

		return "ok";

	}


	public function find_product_presentation(Request $request) {
		$main_product_id = $request->main_product_id;
		$size_id = $request->size_id;
		$color_id = $request->color_id;

		$presentation = ProductPresentation::whereMainProductId($main_product_id)
			->whereSizeId($size_id)
			->whereColorId($color_id)
			->with(['product' => function ($query) {
				$query->select(['id', 'price', 'stock', 'price_promotion', 'promotion_available']);
			}])
			->first();

		return $presentation;
	}

	public function find_product_presentation_ecommerce(Request $request) {
			$main_product_id = $request->main_product_id;
			$color_id = $request->color_id;

			$presentation = ProductPresentation::whereMainProductId($main_product_id)
				->whereColorId($color_id)
				->with(['product' => function ($query) {
					$query->select(['id', 'price', 'stock', 'price_promotion', 'promotion_available']);
				}])
				->first();

			return $presentation;
		}

	public function getting_files(){
		$functionUpload = new ImageUploader();
		$functionUpload->getting('/importacion_imagenes');
		return redirect()->to('/admin/productos-lista');
	}

}
