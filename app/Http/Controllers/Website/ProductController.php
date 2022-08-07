<?php

namespace App\Http\Controllers\Website;

use App\Attribute;
use App\Category;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function featured_products($category_id) {

		$products = Product::where('published', 1)
			->where('outstanding', true)
			->orderBy('updated_at', 'DESC')
			->select(['id', 'name', 'image_thumb', 'price', 'slug', 'promotion_available', 'price_promotion'])
			// ->with('image');
			->with('images');

		if ($category_id != 0) {
			$products = $products->whereCategoryId($category_id);
		}

		$t = [];

		$products = $products->get();

		foreach ($products as $key => $product) {

			$main_image = "https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png";
			$secondary_images = "https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png";


			if (count($product->images)) {
				$main_image = (isset($product->images[1])) ? $product->images[1]->resource_thumb : $product->images[0]->resource_thumb;
				$secondary_image = $product->images[0]->resource_thumb;
			}


			$t[] = array(
				'id' => $product->id,
				'slug' => $product->slug,
				'name' => $product->name,
				'image' => $main_image,
				'secondary_image' => $secondary_image,
				'price' => $product->price,
				'promotion_available' => $product->promotion_available,
				'price_promotion' => $product->price_promotion,
			);
		}
		return $t;
	}

	public function fetch_data_catalog(Request $request) {
		if ($request->ajax()) {
			$products = (new Product)->newQuery();

			if ($request->subcategory_slug != '') {

				$category_slug = $request->category_slug;

				$subcategory_id = Subcategory::whereSlug($request->subcategory_slug)
					->whereHas('category', function($query) use ($category_slug) {
						$query->whereSlug($category_slug);
					})
					->first()->id;
				$products = $products->whereSubcategoryId($subcategory_id);
			} else {
				if ($request->category_slug != '') {
					$category_id = Category::whereSlug($request->category_slug)->first()->id;
					$products = $products->whereCategoryId($category_id);
				}
			}

			if ($request->brand_selected != '') {
				#Marcas seleccionadas;
				$attribute_ids = [];

				$attribute_selected_ids_array = explode(',', $request->brand_selected);

				foreach ($attribute_selected_ids_array as $key => $attribute_slug) {
					$attribute_id = Attribute::whereSlug($attribute_slug)->first()->id;
					$attribute_ids[] = $attribute_id;
				}

				$products = $products->whereHas('attributes', function ($query) use ($attribute_ids) {
					$query->whereIn('attributes.id', $attribute_ids);
				});
			}

			#Busqueda
			if ($request->q != '') {
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

				if ($request->subcategory_slug != '') {
					$subcategory_id = Subcategory::whereSlug($request->subcategory_slug)->first()->id;
					$products = $products->whereSubcategoryId($subcategory_id);
				} else {
					if ($request->category_slug != '') {
						$category_id = Category::whereSlug($request->category_slug)->first()->id;
						$products = $products->whereCategoryId($category_id);
					}
				}
				// ->with(['own_attributes' => function ($query) {
				// 	$query->whereCategoryAttributeId(1);
				// }]);

				if (count($attributes_id_searched)) {
					$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
						$query->whereIn('attributes.id', $attributes_id_searched);
					})
						->wherePublished(1);

					if ($request->subcategory_slug != '') {
						$subcategory_id = Subcategory::whereSlug($request->subcategory_slug)->first()->id;
						$products = $products->whereSubcategoryId($subcategory_id);
					} else {
						if ($request->category_slug != '') {
							$category_id = Category::whereSlug($request->category_slug)->first()->id;
							$products = $products->whereCategoryId($category_id);
						}
					}
					// ->with(['own_attributes' => function ($query) {
					// 	$query->whereCategoryAttributeId(1);
					// }])
					// ;
				}
			}

			$products = $products->with('photo')
				->orderBy('id', 'DESC')
				->wherePublished(1);

			$products = $products->paginate($request->per_page);

			$path = $this->get_current_company_path();

			if ($path == 'website') {
				return view('website.catalog.3_right_catalog', compact('products'))->render();
			} else if ($path == 'oyeepe') {
				return view('oyeepe.home.2_shop', compact('products'))->render();
			} else if($path == 'yekatex'){
				return view('yekatex.catalog.3_right_catalog', compact('products'))->render();
			} else if ($path == 'divemotor'){
				return view('divemotor.catalog..3_right_catalog', compact('products'))->render();
			}
		}
	}

	public function show_cart(Request $request) {
		$ids = $request->ids;

		$cart_array = [];

		if ($ids != 'null') {
			$ids_array = explode(',', $ids);

			$valores = array_count_values($ids_array);


			foreach ($valores as $key => $value) {
				$product = Product::with('photo')
					->find($key);

				$cart_array[] = array(
					'id' => $product->id,
					'stock' => $product->stock,
					'image' => ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png',
					// 'image' => $product->image_thumb,
					'name' => $product->name,
					'slug' => $product->slug,
					'stock' => $product->stock,
					'price' => ($product->promotion_available) ? $product->price_promotion : $product->price,
					'quantity' => $value,
				);
			}
		}

		return $cart_array;
	}

	public function show_cart_lite(Request $request) {
		$ids = $request->ids;
		$cart_array = [];

		if ($ids != 'null') {
			$ids_array = explode(',', $ids);

			$valores = array_count_values($ids_array);

			foreach ($valores as $key => $value) {
				$product = Product::with('photo')
					->find($key);

				$cart_array[] = array(
					'name' => $product->name,
					'price' => ($product->promotion_available) ? $product->price_promotion : $product->price,
					'quantity' => $value,
				);
			}
		}

		return $cart_array;
	}
}
