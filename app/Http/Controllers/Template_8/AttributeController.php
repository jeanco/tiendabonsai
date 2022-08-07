<?php

namespace App\Http\Controllers\Template_8;

use App\Category;
use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;

class AttributeController extends Controller {

	public function by_subcategory(Request $request) {

		$subcategory_slug = $request->subcategory_slug;
		$category_slug = $request->category_slug;
		if ($subcategory_slug != '') {
			$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_slug) {
				$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
					$query->where('subcategories.slug', $subcategory_slug);
				});
			})->with(['attributes_relationship' => function ($query) use ($subcategory_slug) {
				$query->wherePublished(1);
				$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
					$query->where('subcategories.slug', $subcategory_slug);
				});
			}])->wherePublished(1)->get();
		} else if ($category_slug != '') {
			$category = Category::whereSlug($category_slug)->first();
			$subcategories_ids = Subcategory::whereCategoryId($category->id)->pluck('id')->toArray();

			$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategories_ids) {
				$query->whereHas('subcategories', function ($query) use ($subcategories_ids) {
					$query->wherePublished(1);
					$query->whereIn('subcategories.id', $subcategories_ids);
				});
			})->with(['attributes_relationship' => function ($query) use ($subcategories_ids) {
				$query->wherePublished(1);
				$query->whereHas('subcategories', function ($query) use ($subcategories_ids) {
					$query->whereIn('subcategories.id', $subcategories_ids);
				});
			}])->wherePublished(1)->get();
		} else {
			$category_attributes = $this->attributes_with_their_categories();
		}

		return view('template_8.catalog.attribute_filter', compact('category_attributes'))->render();
	}

}
