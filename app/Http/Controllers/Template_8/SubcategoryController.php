<?php

namespace App\Http\Controllers\Template_8;

use App\Http\Controllers\Controller;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller {

	public function get_by_category($category_id) {
		$subcategories = Subcategory::whereCategoryId($category_id)
			->wherePublished(1)
			->select(['id', 'name', 'slug'])
			->get();

		return $subcategories;
	}

	public function get_products($subcategory_id, Request $request) {

		if ($subcategory_id == 0) {
			$products = Product::wherePublished(1)
				->whereCategoryId($request->category_id)
				->select(['id', 'name'])
				->with('main_photo')
				->get();

			return $products;
		}

		$products = Product::wherePublished(1)
			->whereSubcategoryId($subcategory_id)
			->select(['id', 'name'])
			->with('main_photo')
			->get();

		return $products;

	}

}
