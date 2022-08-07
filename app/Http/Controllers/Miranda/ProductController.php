<?php

namespace App\Http\Controllers\Miranda;

use App\Company;
use App\Product;
use App\Category;
use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

	public function fetch_data(Request $request) {

		if ($request->ajax()) {
			$products = Product::with('photo')
				->orderBy('id', 'DESC')
				->with('city')
				->with(['attributes' => function($query){
					$query->whereHas('category_attribute', function($query){
						$query->whereIn('slug', ['banos', 'area-total-m2', 'dormitorios']);
					});
					$query->with('category_attribute');
				}])
				->with(['own_attributes' => function ($query) {
					$query->whereCategoryAttributeId(1);
				}])
				->with('company')
				->wherePublished(1);

			if ($request->category_id != '') {
				$products = $products->whereCategoryId($request->category_id);
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

			$company = Company::whereMain(1)->first();
			//$company_admin = Company::whereId($product->company_id)->select(['cel'])->first();

			$products = $products->paginate($request->per_page);
			$path = $this->get_current_company_path();
			return view("{$path}.catalog.1_list", compact('products', 'company'))->render();
		}
	}

	public function show_perfil($slug) {
		$product = Product::whereSlug($slug)
			->with('images')
			->with('country')
			->with('city')
			->with('own_attributes')
			->first();

		$categories_with_products = Category::wherePublished(1)
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
			}])->get();

			//$company = Company::whereMain(1)->select(['cel'])->first();
			//dd($product->company_id);
			$company_admin = Company::whereId($product->company_id)->select(['cel'])->first();

		$path = $this->get_current_company_path();
		return view("{$path}.catalog.perfil.index", compact('product', 'categoriesshow_perfil_with_products', 'company_admin'));
	}

	public function search(Request $request) {
		// return $request->q;
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

		$products = Product::where('name', 'like', "%$text_to_search%")
			->wherePublished(1)
			->orWhere('description', 'like', "%$text_to_search%")
			->wherePublished(1);

		if (count($attributes_id_searched)) {
			$products = $products->orWhereHas('attributes', function ($query) use ($attributes_id_searched) {
				$query->whereIn('attributes.id', $attributes_id_searched);
			})->wherePublished(1);
		}

		return $products->get();

	}

}
