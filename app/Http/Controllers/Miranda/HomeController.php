<?php

namespace App\Http\Controllers\Miranda;

use App\Company;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;

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
		// $per_page = 8;

		// $products = Product::where('published', 1)
		// // ->where('id', 5)
		// 	->orderBy('id', 'DESC')
		// 	->select(['id', 'name', 'image_thumb', 'price', 'slug'])
		// 	->with('image');
		// if ($category_slug != '') {
		// 	$products = $products->whereHas('category', function ($query) use ($category_slug) {
		// 		$query->where('slug', $category_slug);
		// 	});
		// }
		// $products = $products->paginate($per_page);
		// return view('website.catalog.index', compact('categories', 'covers', 'products', 'brands', 'colors', 'company_logotype', 'company_name'));
		$categories = Category::wherePublished(1)
			->whereHas('products', function ($query) {
				$query->wherePublished(1);
			})
			->with(['subcategories' => function ($query) {
				$query->whereHas('products', function ($query) {
					$query->wherePublished(1);
				});
			}])
			->get();

		// $subcategories = Subcategory::wherePublished(1)
		// 	->whereCategoryId($categories[0]->id)
		// // ->whereHas('products', function ($query) {
		// // 	$query->wherePublished(1);
		// // })
		// 	->get();

		// $attribute_categories = $this->attributes_with_their_categories();
		$products = Product::with('photo')
			->orderBy('id', 'DESC')
			->wherePublished(1)
			->with('subcategory')
			->paginate(10);

		$category_attributes = $this->attributes_with_their_categories();

		/*$categories_with_products = Category::wherePublished(1)
			->whereHas('products', function ($query) {
				$query->wherePublished(1)
					->whereOutstanding(1);
			})
			->with(['products' => function ($query) {
				$query->wherePublished(1)
					->whereOutstanding(1)
					->with('photo')
					->with('subcategory')
					->orderBy('id', 'DESC')
					->take(4);
			}])->get();*/
		$company = Company::whereMain(1)->select(['cel'])->first();

		$path = $this->get_current_company_path();
		return view("{$path}.catalog.index", compact('categories', 'products', 'category_attributes', 'categories_with_products', 'company'));
		// return view('miranda.catalog.index', compact('products', 'prices_range'));
	}
}
