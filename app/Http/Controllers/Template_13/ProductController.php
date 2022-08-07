<?php

namespace App\Http\Controllers\Template_13;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\Place;
use App\Product;
use App\ProductPresentation;
use App\Subcategory;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function get_view($slug, Request $request) {
		
        $place = Place::first();
        $place_id = $request->session()->get('place_id', $place->id);

		$product = Product::with('images')
			->with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])
			->whereSlug($slug)
			->first();

		$presentations = ProductPresentation::whereMainProductId($product->id)
			->with(['product' => function ($query) {
				$query->select(['id', 'price', 'stock', 'price_promotion', 'promotion_available']);
			}])
			->with('color')
			->get();

		$item = DB::table('products')
			->join('categories', 'products.category_id', '=', 'categories.id')
			->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
			->where('products.slug', $slug)
			->where('products.deleted_at', null)
			->select(['categories.name as category_name', 'subcategories.name as subcategory_name', 'products.name as product_name', 'categories.slug as category_slug', 'subcategories.slug as subcategory_slug'])
			->get();

		$related_products = Product::where('subcategory_id', $product->subcategory_id)
		//$related_products = Product::where('category_id', $product->category_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->with('photo')
			->where('is_main_product', true)
			->with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])
	        ->with(['product_child' => function($query) use ($place_id){
                $query->orderBy('price', 'ASC');
                $query->where('is_main_product', false)
                	->with(['unit_price' => function ($query) use ($place_id) {
					$query->wherePlaceId($place_id);
					}]);
            }])
			->get();

		return view('template_13.catalog.perfil.index', compact('product', 'related_products', 'item', 'presentations'));
	}

	public function fetch_data(Request $request) {

		if ($request->ajax()) {
			$place = Place::first();
	        $place_id_selected = $request->session()->get('place_id', $place->id);

			$etiquette_id = $request->etiquette;

			$products = Product::with('photo')
				->whereHas('category' ,function($query){
				$query->wherePublished(1);
				})
				->with(['unit_price' => function ($query) use ($place_id_selected) {
					$query->wherePlaceId($place_id_selected);
				}])
				->with('brands_perfil_product_template_13')
				->where('is_main_product', true)
				->with(['product_child' => function($query) use ($place_id_selected){
					$query->orderBy('price', 'ASC');
					$query->where('is_main_product', false)
						->with(['unit_price' => function ($query) use ($place_id_selected) {
					$query->wherePlaceId($place_id_selected);
					}]);
				}])
				->wherePublished(1);

			if ($etiquette_id) {
				$products = $products->whereHas('etiquettes_detail', function($query) use ($etiquette_id) {
					$query->where('etiquette_id', $etiquette_id);
				});
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

				$products = $products->where(function($query) use ($text_to_search, $attributes_id_searched) {

					$query->where('name', 'like', "%$text_to_search%")
						->orWhere('description', 'like', "%$text_to_search%")
						->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
						$query->whereIn('attributes.id', $attributes_id_searched);
					});
				});

				// $products = $products->where('name', 'like', "%$text_to_search%")
				// 	->orWhere('description', 'like', "%$text_to_search%")
				// 	->wherePublished(1);

				// if ($request->category_id != '') {
				// 	$products = $products->whereCategoryId($request->category_id);
				// }
				// // ->with(['own_attributes' => function ($query) {
				// // 	$query->whereCategoryAttributeId(1);
				// // }]);

				// if (count($attributes_id_searched)) {
				// 	$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
				// 		$query->whereIn('attributes.id', $attributes_id_searched);
				// 	})
				// 		->wherePublished(1);

				// 	if ($request->category_id != '') {
				// 		$products = $products->whereCategoryId($request->category_id);
				// 	}
				// 	// ->with(['own_attributes' => function ($query) {
				// 	// 	$query->whereCategoryAttributeId(1);
				// 	// }])
				// 	// ;
				// }
			}

			$products = $products->orderBy('price', $request->order_by)
				->paginate($request->per_page);
				
			return view("template_13.catalog.3_right_catalog", compact('products'))->render();


			// $products = Product::leftJoin('contents', function($query){
			// 		$query->on('contents.model_id', '=', 'products.id')
			// 			->where('contents.model_type', 2)
			// 			->where('contents.deleted_at', null)
			// 			->take(1);
			// 	})
			// 	//->orderBy('id', 'ASC')
			// 	// ->join('prices', 'products.id', '=', 'prices.product_id')
			// 	// ->where('prices.place_id', $place_id_selected)
			// 	// ->where('prices.deleted_at', null)
			// 	// ->orderBy('prices.price', 'DESC')
			// 	// ->join('prices', 'products.id', '=', 'prices.product_id')
			// 	// ->where('prices.deleted_at', null)
			// 	//->where('prices.place_id', $place_id_selected)
			// 	->join('categories', 'products.category_id', '=', 'categories.id')
			// 	->where('categories.deleted_at', null)
			// 	->where('categories.published', 1)
			// 	->where('products.published', 1);

			// 	// ->with(['unit_price' => function ($query) use ($place_id_selected) {
			// 	// 	$query->wherePlaceId($place_id_selected);
			// 	// }])
			// 	// ->whereHas('category' ,function($query){
			// 	// 	$query->wherePublished(1);
			// 	// })
			// 	// ->wherePublished(1);

			// if ($etiquette_id) {
			// 	$products = $products->whereHas('etiquettes_detail', function($query) use ($etiquette_id) {
			// 		$query->where('etiquette_id', $etiquette_id);
			// 	});
			// }

			// if ($request->subcategory_id) {
			// 	$subcategory = Subcategory::whereSlug($request->subcategory_id)->first();
			// 	$products = $products->where('products.subcategory_id', $subcategory->id);
			// } else if ($request->category_id) {
			// 	$category = Category::whereSlug($request->category_id)->first();
			// 	$products = $products->where('products.category_id', $category->id);
			// }

			// if ($request->attributes_id != '') {
			// 	#Marcas seleccionadas;
			// 	$attribute_ids = [];

			// 	$attribute_selected_ids_array = explode(',', $request->attributes_id);

			// 	foreach ($attribute_selected_ids_array as $key => $attribute_id) {
			// 		// $attribute_id = Attribute::whereSlug($brand_slug)->first()->id;
			// 		$attribute_ids[] = $attribute_id;
			// 	}

			// 	$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
			// 		$query->whereIn('attributes.id', $attribute_ids);
			// 	});
			// }

			// if ($request->q) {
			// 	// return "Ok";
			// 	$text_to_search = $request->q;
			// 	$text_to_search_array = explode(' ', $request->q);

			// 	$attributes_id_searched = [];

			// 	foreach ($text_to_search_array as $key => $name) {
			// 		$attribute = Attribute::whereName($name)
			// 			->wherePublished(1)
			// 			->first();

			// 		if (count($attribute)) {
			// 			$attributes_id_searched[] = $attribute->id;
			// 		}
			// 	}

			// 	$products = $products->where('products.name', 'like', "%$text_to_search%")
			// 		->orWhere('products.description', 'like', "%$text_to_search%")
			// 		->where('products.published', 1);

			// 	if ($request->category_id != '') {
			// 		$products = $products->where('products.category_id', $request->category_id);
			// 	}
			// 	// ->with(['own_attributes' => function ($query) {
			// 	// 	$query->whereCategoryAttributeId(1);
			// 	// }]);

			// 	if (count($attributes_id_searched)) {
			// 		$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
			// 			$query->whereIn('attributes.id', $attributes_id_searched);
			// 		})
			// 			->where('products.published', 1);


			// 		if ($request->category_id != '') {
			// 			$products = $products->where('products.category_id', $request->category_id);
			// 		}
			// 		// ->with(['own_attributes' => function ($query) {
			// 		// 	$query->whereCategoryAttributeId(1);
			// 		// }])
			// 		// ;
			// 	}
			// }
			
			// $products = $products
			// 	->select(['contents.resource as photo', 'products.promotion_end_at as promotion_end_at', 'products.slug as slug', 'products.promotion_available as promotion_available', 'products.promotion_label_image as promotion_label_image', 'products.stock as stock', 'products.price as price', 'products.price_promotion as price_promotion', 'products.promotion_discount as promotion_discount', 'products.minimum_quantity as minimum_quantity', 'products.id as id', 'products.name as name'])
			// 	->orderBy('products.price', $request->order_by)
			// 	->paginate($request->per_page);
			// return view("template_13.catalog.3_right_catalog", compact('products'))->render();
		}
	}

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
				);
			}
		}

		return $cart_array;
	}

	public function show_description($id) {

		$product = Product::with('photo')->find($id);

		return [$product->description, ($product->photo) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'];

	}

	public function get_price($id) {

		$product = DB::table('products')
			->where('id', $id)
			->get();
		
		if (!$product[0]->promotion_available) {
			return [number_format($product[0]->price, 2, '.', ''), ''];
		}

		return [number_format($product[0]->price_promotion, 2, '.', ''), number_format($product[0]->price, 2, '.', '')];
		

	}

	public function get_presentations($main_product_id)
	{		
		$product_name = Product::find($main_product_id)->name;
		$presentations = ProductPresentation::whereMainProductId($main_product_id)
			->with(['product' => function ($query) {
				$query->select(['id', 'price', 'stock', 'price_promotion', 'promotion_available']);
			}])
			->with('color')
			->get();

		return ['presentations' => $presentations, 'product_name' => $product_name];
		//return $presentations;

	}

}
