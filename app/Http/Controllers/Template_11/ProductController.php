<?php

namespace App\Http\Controllers\Template_11;

use App\Attribute;
use App\Category;
use App\Content;
use App\Http\Controllers\Controller;
use App\Place;
use App\Product;
use App\ProductPresentation;
use App\Subcategory;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function get_view($slug, Request $request) {
		
		$item = DB::table('products')
			->join('categories', 'products.category_id', '=', 'categories.id')
			->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
			->where('products.slug', $slug)
			->where('products.deleted_at', null)
			->select(['categories.name as category_name', 'subcategories.name as subcategory_name', 'products.name as product_name', 'categories.slug as category_slug', 'subcategories.slug as subcategory_slug'])
			->get();


		$place = Place::first();
		$place_id = $request->session()->get('place_id', $place->id);

		$is_father_one = Product::whereSlug($slug)
			->first();

		if ($is_father_one->main_product_id && $is_father_one->is_main_product) {
			#is a father
			$presentations_related = ProductPresentation::where('main_product_id', $is_father_one->id)
				->with('product')
				->first();

			return redirect("/catalogo/{$presentations_related->product->slug}");
		}

		$product = Product::with('images')
			->with('main_photo')
			->with('other_photos')
			->with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])
			->whereSlug($slug)
			->first();

		$id = $product->id;
		$color_id = 0;

		if (!$product->is_main_product) {
			$id = $product->main_product_id;

			$presentation = ProductPresentation::whereProductId($product->id)
					->where('main_product_id', $product->main_product_id)
					->first();
			$color_id = $presentation->color_id;

		}

		$main_photo = Content::whereModelId($id)
			->whereModelType(2)
			->whereType(1)
			->whereColorId($color_id)
			->first();


		$other_photos = Content::whereModelId($id)
			->whereModelType(2)
			->where('type', '!=', 1)
			->whereColorId($color_id)
			->get();


		$related_products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->with('main_photo')
			->with('other_photo')
			->whereIsMainProduct(1)
			->with(['product_child' => function ($query) {
				$query->whereColumn('id', '!=', 'main_product_id');
				$query->where('published', 1);
				$query->select(['id', 'name', 'slug', 'main_product_id']);
			}])
			->take(3)
			->get();

		$categories_slug = 'marcas';

		/*$categories_attributes = CategoryAttribute::whereSlug($categories_slug)
			->first();
		$categories_attributes = $categories_attributes->id;*/

		$product_id = $product->id;

		$brand = Product::whereId($product_id)->with('brands_perfil_product')->first();

		if (count($brand->brands_perfil_product) > 0) {
			$brand = $brand->brands_perfil_product->first();
			$brand = $brand->name;
		} else {
			$brand = "-";
		}

		//dd($brand);
		//dd($brand->name);
		$main_product_id = $product->main_product_id;
		$colors = Attribute::whereHas('category_attribute', function ($query) {
			$query->whereSlug('color');
		})
			->wherePublished(1)
			->whereHas('color_presentations', function ($query) use ($main_product_id) {
				$query->whereMainProductId($main_product_id);
			})
			->with(['color_presentation' => function ($query) use ($main_product_id) {
				$query->whereMainProductId($main_product_id);
				$query->with(['product' => function ($query) {
					$query->select(['id', 'name', 'slug']);
				}]);
			}])
			->get();

		$product_presentation = ProductPresentation::whereProductId($product->id)
			->whereMainProductId($product->main_product_id)
			->first();

		if ($product->is_main_product) {
			$product_presentation = ProductPresentation::whereMainProductId($product->main_product_id)->first();
		}



		$sizes = [];

		if (count($product_presentation)) {
			$sizes = ProductPresentation::whereMainProductId($main_product_id)
				->whereColorId($product_presentation->color_id)
				->orderBy('size_id', 'ASC')
				->with('size')
				->get();
		}

		return view('template_11.catalog.perfil.index', compact('product', 'related_products', 'brand', 'colors', 'sizes', 'product_presentation', 'main_photo', 'other_photos', 'item'));

		//return view('template_11.catalog.perfil.index', compact('product', 'related_products', 'item'));
	}

	public function fetch_data(Request $request) {

		if ($request->ajax()) {

			$etiquette_id = $request->etiquette;
			$promotion = $request->promotion;

			$products = Product::with('photo')
				->with('main_photo')
				->with('other_photo')
				->orderBy('id', 'DESC')
				->whereIsMainProduct(1)
			// ->whereColumn('id', 'main_product_id')
			// ->whereHas('product_child', function ($query) {
			// 	$query->wherePublished(1);
			// })
				->with(['product_child' => function ($query) use ($etiquette_id) {
					$query->whereColumn('id', '!=', 'main_product_id');
					//$query->with('main_photo');
					// $query->with(['presentation' => function($query){
					// 	$query->with('main_photo');
					// 	$query->with('other_photo');
					// }]);
					//$query->with('other_photo');
					$query->wherePublished(1);
					if ($etiquette_id) {
						$query->whereHas('etiquettes_detail', function($query) use ($etiquette_id) {
							$query->where('etiquette_id', $etiquette_id);
						});
						// $query->with(['etiquettes_detail' => function($query) use ($etiquette_id) {
						// $query->where('etiquette_id', $etiquette_id);
						// }]);
					}
					//$query->select(['id', 'name', 'slug', 'main_product_id']);
				}])
				->wherePublished(1);

				if ($etiquette_id) {
					$products = $products->with(['etiquettes_detail' => function($query) use ($etiquette_id) {
					$query->where('etiquette_id', $etiquette_id);
				}]);
				}

				if ($promotion == "true") {
					$products = $products->wherePromotionAvailable(true);
				}
			
			if ($request->subcategory_id) {
				$subcategory = Subcategory::whereSlug($request->subcategory_id)->first();
				$products = $products->whereSubcategoryId($subcategory->id);
			} else if ($request->category_id) {
				$category = Category::whereSlug($request->category_id)->first();
				$products = $products->whereCategoryId($category->id);
			}

			if ($request->attributes_id != '') {
				#Marcas seleccionadas;
				$attribute_ids = [];

				$attribute_selected_ids_array = explode(',', $request->attributes_id);

				foreach ($attribute_selected_ids_array as $key => $attribute_id) {
					// $attribute_id = Attribute::whereSlug($brand_slug)->first()->id;
					$attribute_ids[] = $attribute_id;
				}

				$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
					$query->whereIn('attributes.id', $attribute_ids);
				});
			}

			if ($request->q) {
				// return "Ok";
				$text_to_search = $request->q;
				$text_to_search_array = explode(' ', $request->q);

				$attributes_id_searched = [];

				foreach ($text_to_search_array as $key => $name) {
					$attribute = Attribute::whereName($name)
						->wherePublished(1)
						->first();

					if (count($attribute)) {
						$attributes_id_searched[] = $attribute->id;
					}
				}

				$products = $products->where('name', 'like', "%$text_to_search%")
					->orWhere('description', 'like', "%$text_to_search%")
					->wherePublished(1);

				if ($request->category_id != '') {
					$products = $products->whereCategoryId($request->category_id);
				}
				// ->with(['own_attributes' => function ($query) {
				// 	$query->whereCategoryAttributeId(1);
				// }]);

				if (count($attributes_id_searched)) {
					$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
						$query->whereIn('attributes.id', $attributes_id_searched);
					})
						->wherePublished(1);

					if ($request->category_id != '') {
						$products = $products->whereCategoryId($request->category_id);
					}
					// ->with(['own_attributes' => function ($query) {
					// 	$query->whereCategoryAttributeId(1);
					// }])
					// ;
				}
			}

			$products = $products->paginate($request->per_page);

			$etiquette_flag = false;
			if ($etiquette_id) {
				$etiquette_flag = true;
			}
			return view("template_11.catalog.3_right_catalog", compact('products', 'etiquette_flag'))->render();
		}
	}

	// public function fetch_data(Request $request) {

	// 	if ($request->ajax()) {
	// 		$etiquette_id = $request->etiquette;

	// 		$products = Product::with('photo')
	// 			->whereHas('category' ,function($query){
	// 			$query->wherePublished(1);
	// 			})
	// 			->with('brands_perfil_product_template_11')
	// 			->wherePublished(1);

	// 		if ($etiquette_id) {
	// 			$products = $products->whereHas('etiquettes_detail', function($query) use ($etiquette_id) {
	// 				$query->where('etiquette_id', $etiquette_id);
	// 			});
	// 		}

	// 		if ($request->subcategory_id) {
	// 			$subcategory = Subcategory::whereSlug($request->subcategory_id)->first();
	// 			$products = $products->whereSubcategoryId($subcategory->id);
	// 		} else if ($request->category_id) {
	// 			$category = Category::whereSlug($request->category_id)->first();
	// 			$products = $products->whereCategoryId($category->id);
	// 		}

	// 		if ($request->attributes_id != '') {
	// 			#Marcas seleccionadas;
	// 			$attribute_ids = [];

	// 			$attribute_selected_ids_array = explode(',', $request->attributes_id);

	// 			foreach ($attribute_selected_ids_array as $key => $attribute_id) {
	// 				// $attribute_id = Attribute::whereSlug($brand_slug)->first()->id;
	// 				$attribute_ids[] = $attribute_id;
	// 			}

	// 			$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
	// 				$query->whereIn('attributes.id', $attribute_ids);
	// 			});
	// 		}

	// 		if ($request->q) {
	// 			// return "Ok";
	// 			$text_to_search = $request->q;
	// 			$text_to_search_array = explode(' ', $request->q);

	// 			$attributes_id_searched = [];

	// 			foreach ($text_to_search_array as $key => $name) {
	// 				$attribute = Attribute::whereName($name)
	// 					->wherePublished(1)
	// 					->first();

	// 				if (count($attribute)) {
	// 					$attributes_id_searched[] = $attribute->id;
	// 				}
	// 			}

	// 			$products = $products->where(function($query) use ($text_to_search, $attributes_id_searched) {

	// 				$query->where('name', 'like', "%$text_to_search%")
	// 					->orWhere('description', 'like', "%$text_to_search%")
	// 					->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
	// 					$query->whereIn('attributes.id', $attributes_id_searched);
	// 				});
	// 			});

	// 		}

	// 		$products = $products->orderBy('price', $request->order_by)
	// 			->paginate($request->per_page);
				
	// 		return view("template_11.catalog.3_right_catalog", compact('products'))->render();
	
	// 	}
	// }

	public function show_cart_lite(Request $request) {
		$ids = $request->ids;
		$cart_array = [];

		if ($ids != 'null') {
			$ids_array = explode(',', $ids);

			//$valores = array_count_values($ids_array);

			#place by default
			$place = Place::first();
			$place_id = $request->session()->get('place_id', $place->id);
			$valores = (array) json_decode($ids);
			foreach ($valores as $key => $value) {
				$product = Product::with('photo')
					->with(['unit_price' => function ($query) use ($place_id) {
						$query->wherePlaceId($place_id);
					}])
					->find($key);

				$price = $product->price;

				if ($product->unit_price) {
					$price = $product->unit_price->price;
				}

				if ($product->promotion_available) {
					$price = $product->price_promotion;
				}

				$cart_array[] = array(
					'name' => $product->name,
					'price' => $price,
					'quantity' => $value,
					'has_hidden_price' => $product->has_hidden_price,
					'message_about_price' => $product->message_about_price,
				);
			}
		}

		return $cart_array;
	}

	public function show_cart(Request $request) {
		$ids = $request->ids;
		$cart_array = [];

		if ($ids != 'null') {
			//$ids_array = explode(',', $ids);

			#place by default
			$place = Place::first();
			$place_id = $request->session()->get('place_id', $place->id);

			//$valores = array_count_values($ids_array);
			$valores = (array) json_decode($ids);
			foreach ($valores as $key => $value) {
				$product = Product::with('photo')
					->with(['unit_price' => function ($query) use ($place_id) {
						$query->wherePlaceId($place_id);
					}])
					->find($key);
				$price = $product->price;

				if ($product->unit_price) {
					$price = $product->unit_price->price;
				}

				if ($product->promotion_available) {
					$price = $product->price_promotion;
				}

				$cart_array[] = array(
					'id' => $product->id,
					'stock' => $product->stock,
					'image' => ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png',
					// 'image' => $product->image_thumb,
					'name' => $product->name,
					'slug' => $product->slug,
					'stock' => $product->stock,
					'minimum_quantity' => $product->minimum_quantity,
					'price' => $price,
					'quantity' => $value,
					'has_hidden_price' => $product->has_hidden_price,
					'message_about_price' => $product->message_about_price,

				);
			}
		}

		return $cart_array;
	}

	public function show_description($id) {

		$product = Product::with('photo')->find($id);

		return [$product->description, ($product->photo) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'];

	}

}
