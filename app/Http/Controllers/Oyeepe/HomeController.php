<?php

namespace App\Http\Controllers\Oyeepe;

use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller {

	public function catalog() {
		// $categories = $this->categories_with_their_subcategories();

		// if ($slug_company == 'catalogo') {
		// 	$covers = $this->covers();
		// 	$company_logotype = '';
		// 	$company_name = '';
		// } else {
		// 	$company = Company::whereSlugCompany($slug_company)->first();
		// 	$company_logotype = $company->logotype;
		// 	$company_name = $company->name_company;
		// 	$covers = $this->catalogs($company->id);
		// }

		// $brands = $this->attributes_of_the_category(1);
		// $colors = $this->attributes_of_the_category(3);

		$per_page = 8;

		$products = Product::where('published', 1)
		// ->where('id', 5)
			->orderBy('id', 'DESC')
			->select(['id', 'name', 'image_thumb', 'price', 'slug'])
			->with('image');

		// if ($category_slug != '') {
		// 	$products = $products->whereHas('category', function ($query) use ($category_slug) {
		// 		$query->where('slug', $category_slug);
		// 	});
		// }

		$products = $products->paginate($per_page);
		return view('oyeepe.home.index', compact('products'));
		// return view('website.catalog.index', compact('categories', 'covers', 'products', 'brands', 'colors', 'company_logotype', 'company_name'));
	}
}
