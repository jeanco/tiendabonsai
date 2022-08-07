<?php

namespace App\Http\Controllers\Template_11;

use App\Attribute;
use App\Category;
use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;
use DB;

class AttributeController extends Controller {
    
    public function by_subcategory(Request $request) {

		// $subcategory_slug = $request->subcategory_slug;
        
		// if ($subcategory_slug != '') {
		// 	$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_slug) {
		// 		$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
		// 			$query->where('subcategories.slug', $subcategory_slug);
		// 		});
		// 	})->with(['attributes_relationship' => function ($query) use ($subcategory_slug) {
		// 		$query->wherePublished(1);
		// 		$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
		// 			$query->where('subcategories.slug', $subcategory_slug);
		// 		});
		// 	}])->wherePublished(1)->get();
		// } else {
		// 	$category_attributes = $this->attributes_with_their_categories();
		// }
    	
		$subcategory_slug = $request->subcategory_slug;
		$category_slug = $request->category_slug;

		if ($subcategory_slug) {

			$subcategory = DB::table('subcategories')
				->where('slug', $subcategory_slug)
				->select(['id'])
				->first();

			$subcategory_id = $subcategory->id;

			$category_attributes = CategoryAttribute::wherePublished(1)
				->select(['id', 'name'])
			// whereHas('attributes_relationship', function ($query) use ($subcategory_slug) {
			// 	$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
			// 		$query->where('subcategories.slug', $subcategory_slug);
			// 		//$query->has('products_published');
			// 	});
			->with(['attributes_relationship' => function ($query) use ($subcategory_id) {
				$query->wherePublished(1);
				$query->whereHas('products', function ($query) use ($subcategory_id) {
					$query->where('products.subcategory_id', $subcategory_id)
						->where('products.published', 1);
				});
				$query->with(['products' => function($query) use($subcategory_id) {
					$query->where('products.subcategory_id', $subcategory_id)
						->where('products.published', 1);
				}]);

			}])
			->get();

		} else if ($category_slug != '') {
			$category = Category::whereSlug($category_slug)->first();
			$category_id = $category->id;
			//$subcategories_ids = Subcategory::whereCategoryId($category->id)->pluck('id')->toArray();

			$category_attributes = CategoryAttribute::wherePublished(1)
				->select(['id', 'name'])
				->with(['attributes_relationship' => function ($query) use ($category_id) {
					$query->wherePublished(1);
					$query->whereHas('products', function ($query) use ($category_id) {
						$query->where('products.category_id', $category_id)
							->where('products.published', 1);
					});
					$query->with(['products' => function($query) use($category_id) {
						$query->where('products.category_id', $category_id)
							->where('products.published', 1);
					}]);
				}])
			->get();
		} else {
			$category_attributes = $this->attributes_with_their_categories();
		}


		// if ($subcategory_slug != '') {
		// 	$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_slug) {
		// 		$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
		// 			$query->where('subcategories.slug', $subcategory_slug);
		// 			//$query->has('products_published');
		// 		});
		// 	})->with(['attributes_relationship' => function ($query) use ($subcategory_slug) {
		// 		$query->wherePublished(1);
		// 		$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
		// 			$query->where('subcategories.slug', $subcategory_slug);
		// 			//$query->has('products_published');
		// 		});
		// 	}])->wherePublished(1)->get();
		// } else if ($category_slug != '') {
		// 	$category = Category::whereSlug($category_slug)->first();
		// 	$subcategories_ids = Subcategory::whereCategoryId($category->id)->pluck('id')->toArray();

		// 	$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategories_ids) {
		// 		$query->wherePublished(1);
		// 		$query->whereHas('subcategories', function ($query) use ($subcategories_ids) {
		// 			$query->wherePublished(1);
		// 			$query->whereIn('subcategories.id', $subcategories_ids);
		// 			//$query->whereHas('products_published');
		// 		});
		// 	})->with(['attributes_relationship' => function ($query) use ($subcategories_ids) {
		// 		$query->wherePublished(1);
		// 		$query->whereHas('subcategories', function ($query) use ($subcategories_ids) {
		// 			$query->wherePublished(1);
		// 			$query->whereIn('subcategories.id', $subcategories_ids);
		// 			//$query->whereHas('products_published');
		// 		});
		// 	}])->wherePublished(1)->get();
		// } else {
		// 	$category_attributes = $this->attributes_with_their_categories();
		// }

		return view('template_11.catalog.attribute_filter', compact('category_attributes'))->render();
	}


}
