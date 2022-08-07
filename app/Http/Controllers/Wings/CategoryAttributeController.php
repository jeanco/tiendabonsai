<?php

namespace App\Http\Controllers\Wings;

use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryAttributeController extends Controller {

	public function by_subcategory_to_cars(Request $request) {

		$subcategory_slug = $request->subcategory_slug;

		if ($subcategory_slug != '') {
			$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_slug) {
				$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
					$query->where('subcategories.id', $subcategory_slug);
				});
			})->with(['attributes_relationship' => function ($query) use ($subcategory_slug) {
				$query->wherePublished(1);
				$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
					$query->where('subcategories.id', $subcategory_slug);
				});
			}])->wherePublished(1)->get();
		} else {
			$category_attributes = $this->attributes_with_their_categories();
		}

		return view('wings.cars.category_attribute_filter', compact('category_attributes'))->render();
    }

	public function by_subcategory_to_catalog(Request $request) {

		$subcategory_slug = $request->subcategory_slug;

		if ($subcategory_slug != '') {
			$category_attributes = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_slug) {
				$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
					$query->where('subcategories.id', $subcategory_slug);
				});
			})->with(['attributes_relationship' => function ($query) use ($subcategory_slug) {
				$query->wherePublished(1);
				$query->whereHas('subcategories', function ($query) use ($subcategory_slug) {
					$query->where('subcategories.id', $subcategory_slug);
				});
			}])->wherePublished(1)->get();
		} else {
			$category_attributes = $this->attributes_with_their_categories();
		}

		return view('wings.catalog.category_attribute_filter', compact('category_attributes'))->render();
	}
}
