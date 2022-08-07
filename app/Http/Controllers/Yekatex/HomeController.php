<?php

namespace App\Http\Controllers\Yekatex;

use App\Campaign;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller {
	public function index() {

		$covers = Campaign::where('published', 1)
			->select(['id', 'image', 'link', 'title', 'link_text', 'subtitle', 'content'])
			->whereCategoryId(2)
			->take(2)
			->get();

		return view("{$path}.home.index", compact('covers'));
	}

	public function catalog() {
		$categories = $this->categories_with_their_subcategories();

		$covers_ = $this->covers();
		$company_logotype = '';
		$company_name = '';

		$per_page = 12;

		$products = Product::where('published', 1)
			->where('id', 5)
			->orderBy('id', 'DESC')
			->select(['id', 'name', 'image_thumb', 'price', 'slug'])
			->with('image');

		// if ($category_slug != '') {
		// 	$products = $products->whereHas('category', function ($query) use ($category_slug) {
		// 		$query->where('slug', $category_slug);
		// 	});
		// }

		$category_attributes = $this->attributes_with_their_categories();

		$products = $products->paginate($per_page);

		$promotions_3 = Campaign::whereCategoryId(3)
			->wherePublished(1)
			->get();

		$path = $this->get_current_company_path();

		return view("{$path}.catalog.index", compact('categories', 'covers_', 'products', 'company_logotype', 'company_name', 'category_attributes', 'promotions_3'));
	}

	public function productos_perfil($slug) {
		$product = Product::whereSlug($slug)
			->with('images')
			->with('brands')
			->with('company')
			->with('attributes')
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

		$path = $this->get_current_company_path();
		return view("{$path}.catalog.perfil.index", compact('product', 'interests'));

	}
}
