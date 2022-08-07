<?php

namespace App\Http\Controllers\Website;

use App\Attribute;
use App\Campaign;
use App\Category;
use App\Company;
use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller {
	public function index() {
		#WEBSITE
		// $categories = $this->categories_with_their_subcategories();
		$categories = Category::wherePublished(1)
			->whereHas('products', function ($query) {
				$query->wherePublished(1);
			})->get();

		$first_attributes = Attribute::whereCategoryAttributeId(1)
			->wherePublished(1)
			->get();
		// $subcategories = Subcategory::wherePublished(1)
		// 	->whereCategoryId($categories[0]->id)
		// 	->get();

		//                     $covers = $this->covers();
		// $offers = $this->offers();
		#Offers divided!
		$products = Product::where('published', 1)
			->where('promotion_available', true)
			->where('outstanding_promotion', true)
			->orderBy('updated_at', 'DESC')
			->take(4)
			->get();

		$index = 0;
		$offers = [];
		foreach ($products as $key => $product) {
			$exampler = $key + 1;
			if ($exampler % 3 == 0) {
				$offers[$index][] = array(
					'offerTitle' => $product->promotion_title,
					'itemSlug' => $product->slug,
					'imageUrl' => (count($product->promotion_image) ? $product->promotion_image : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
					'imageThumbUrl' => (count($product->promotion_image_thumb) ? $product->promotion_image_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
				);
				$index++;
			} else {
				$offers[$index][] = array(
					'offerTitle' => $product->promotion_title,
					'itemSlug' => $product->slug,
					'imageUrl' => (count($product->promotion_image) ? $product->promotion_image : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
					'imageThumbUrl' => (count($product->promotion_image_thumb) ? $product->promotion_image_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
				);
			}
		}
		#OYEEPE
		$path = $this->get_current_company_path();

		$per_page = 8;

		$products = Product::where('published', 1)
		// ->where('id', 5)
			->orderBy('id', 'DESC')
			->select(['id', 'name', 'image_thumb', 'price', 'slug'])
			->with('image');

		$products = $products->paginate($per_page);

		#Miranda
		#Categories with products
		// $categories_with_products = Category::wherePublished(1)
		// 	->whereHas('products', function ($query) {
		// 		$query->wherePublished(1)
		// 			->whereOutstanding(1);
		// 	})
		// 	->with(['products' => function ($query) {
		// 		$query->wherePublished(1)
		// 			->whereOutstanding(1)
		// 			->with('photo')
		// 			->with('subcategory')
		// 			->orderBy('id', 'DESC');
		// 	}])->get();
		$promotions = Campaign::whereCategoryId(2)
			->wherePublished(1)
			->get();

		// $subcategories = Subcategory::wherePublished(1)
		// 	->whereCategoryId(2)
		// 	->select(['id', 'name', 'slug'])
		// 	->get();

		// return $categories_with_products;
		return view("{$path}.home.index", compact('categories', 'offers', 'products', 'promotions', 'first_attributes'));
	}

	public function catalog($slug_company) {
		$categories = $this->categories_with_their_subcategories();

		if ($slug_company == 'catalogo') {
			$covers_ = $this->covers();
			$company_logotype = '';
			$company_name = '';
		} else {
			$company = Company::whereSlugCompany($slug_company)->first();
			$company_logotype = $company->logotype;
			$company_name = $company->name_company;
			$covers_ = $this->catalogs($company->id);
		}

		// $brands = $this->attributes_of_the_category(1);
		// $colors = $this->attributes_of_the_category(3);

		$per_page = 12;
		// $category_slug = "";

		// if ($request->per_page != '') {
		// 	$per_page = $request->per_page;
		// }

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
		// return "dx";
		$category_attributes = $this->attributes_with_their_categories();
		$products = $products->paginate($per_page);

		return view('website.catalog.index', compact('categories', 'covers_', 'products', 'company_logotype', 'company_name', 'category_attributes'));
	}

	public function productos_perfil($slug) {
		$product = Product::whereSlug($slug)
			->with('images')
			->with('brands')
			->with('company')
			->with(['category' => function($query){
				$query->whereSlug('cupones');
			}])
			->with('attributes')
			->first();
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
		// return $interests;
		$path = $this->get_current_company_path();
		return view("{$path}.catalog.perfil.index", compact('product', 'interests'));

	}
}
