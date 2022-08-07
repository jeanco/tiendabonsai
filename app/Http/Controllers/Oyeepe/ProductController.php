<?php

namespace App\Http\Controllers\Oyeepe;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function fetch_data_catalog(Request $request) {

		if ($request->ajax()) {

			$products = Product::where('published', 1)
				->orderBy('id', 'DESC')
				->select(['id', 'name', 'image_thumb', 'price', 'slug', 'promotion_available', 'price_promotion']);

			// if ($request->slug_company != '') {
			// 	$company = Company::whereSlugCompany($request->slug_company)->first();
			// 	$products = $products->whereCompanyId($company->id);
			// }

			// if ($request->subcategory_slug != '') {
			// 	$subcategory_id = Subcategory::whereSlug($request->subcategory_slug)->first()->id;
			// 	$products = $products->whereSubcategoryId($subcategory_id);
			// } else {
			if ($request->category_slug != '') {
				$category_id = Category::whereSlug($request->category_slug)->first()->id;
				$products = $products->whereCategoryId($category_id);
			}
			// }

			// if ($request->brand_selected != '') {
			// 	#Marcas seleccionadas;
			// 	$brand_ids = [];

			// 	$brand_selected_ids_array = explode(',', $request->brand_selected);

			// 	foreach ($brand_selected_ids_array as $key => $brand_slug) {
			// 		$attribute_id = Attribute::whereSlug($brand_slug)->first()->id;
			// 		$brand_ids[] = $attribute_id;
			// 	}

			// 	$products = $products->whereHas('attributes', function ($query) use ($brand_ids) {
			// 		$query->whereIn('attributes.id', $brand_ids);
			// 	});
			// }

			// if ($request->color_selected != '') {
			// 	$attribute_id = Attribute::whereSlug($request->color_selected)->first()->id;

			// 	$products = $products->whereHas('attributes', function ($query) use ($attribute_id) {
			// 		$query->where('attributes.id', $attribute_id);
			// 	});

			// }

			// if ($request->price_range_selected != '') {
			// 	$prices_array = explode(',', $request->price_range_selected);

			// 	$start_price = $prices_array[0];
			// 	$end_price = $prices_array[1];

			// 	$products = $products->where('price', '>=', $start_price)
			// 		->where('price', '<=', $end_price);
			// }

			// if ($request->promotion != '') {
			// 	$products = $products->wherePromotionAvailable(true);
			// }

			// $ordered_by = $request->ordered_by;

			// switch ($ordered_by) {
			// case 'relevance':
			// 	$products = $products->orderBy('created_at', 'DESC');
			// 	break;

			// case 'min_price':
			// 	$products = $products->orderBy('price', 'asc');
			// 	break;

			// case 'max_price':
			// 	$products = $products->orderBy('price', 'desc');
			// 	break;
			// }
			$products = $products->with('image')
				->orderBy('id', 'DESC')
				->paginate($request->per_page);

			return view('website.catalog.3_right_catalog', compact('products'))->render();
		}
	}

	public function show_perfil($slug) {
		$product = Product::whereSlug($slug)
			->with('images')
			->with('brands')
			->with(['company' => function ($query) {
				$query->select(['id', 'logotype_thumb', 'work_description_company', 'description_company']);
			}])
			->first();
		// $products_related
		$interests = [];

		$products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->with('photo')
			->with('company')
			->get();

		foreach ($products as $y => $product_) {

			$imageUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
			$imageThumbUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

			if ($product_->photo != null) {
				$imageUrl = $product_->photo->resource;
				$imageThumbUrl = $product_->photo->resource_thumb;
			}

			$interests[$y]['slug'] = $product_->slug;
			$interests[$y]['id'] = $product_->id;
			$interests[$y]['name'] = $product_->name;
			$interests[$y]['stock'] = $product_->stock;
			$interests[$y]['imageUrl'] = $imageUrl;
			$interests[$y]['imageThumbUrl'] = $imageThumbUrl;
			$interests[$y]['price'] = (float) $product_->price;
			$interests[$y]['promotion']['flag'] = (boolean) $product_->promotion_available;
			$interests[$y]['promotion']['price'] = (float) $product_->price_promotion;
			$interests[$y]['promotion']['imageUrl'] = (count($product_->promotion_label_image) ? $product_->promotion_label_image : "");
		}

		return view('oyeepe.catalog.perfil.index', compact('product', 'interests'));
	}

	public function catalog(Request $request) {

		$category_slug = $request->category;

		$per_page = 8;
		$products = Product::where('published', 1)
			->orderBy('id', 'DESC')
			->select(['id', 'name', 'image_thumb', 'price', 'slug'])
			->with('image');

		$products = $products->paginate($per_page);

		return view('oyeepe.catalog.index', compact('products'));

	}
}
