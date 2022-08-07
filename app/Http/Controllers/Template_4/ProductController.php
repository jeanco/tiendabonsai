<?php

namespace App\Http\Controllers\Template_4;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\Place;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function get_view($slug, Request $request) {

		$place = Place::first();
		$place_id = $request->session()->get('place_id', $place->id);

		$product = Product::with('images')
			->with('main_photo')
			->with('other_photos')
			->with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])
			->whereSlug($slug)
			->first();

		$related_products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->with('main_photo')
			->with('other_photo')
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
		$product_photo = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
		if (count($product->main_photo)) {
			$product_photo = $product->main_photo->resource;
		} else if (count($product->other_photos)) {
			$product_photo = $product->other_photos[0]->resource;
		}

		$product_name = $product->name;
		$product_description = $product->description;
		return view('template_4.catalog.perfil.index', compact('product', 'related_products', 'brand', 'product_photo', 'product_name', 'product_description'));
	}

	public function fetch_data(Request $request) {

		if ($request->ajax()) {

			$products = Product::with('photo')
				->with('main_photo')
				->with('other_photo')
				->with('brands_perfil_product')
				->orderBy('price', 'ASC')
			//->orderBy('id', 'DESC')
				->wherePublished(1);

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
			return view("template_4.catalog.3_right_catalog", compact('products'))->render();
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
					'price' => $price,
					'quantity' => $value,
				);
			}
		}

		return $cart_array;
	}

	public function is_there_stock($product_id, Request $request) {

		$stock_required = $request->stock;

		$product = Product::find($product_id);

		if ($product->stock >= $stock_required) {
			return;
		}

		return response()->json(['title' => 'Advertencia', 'message' => 'No hay stock'], 400);
	}

}
