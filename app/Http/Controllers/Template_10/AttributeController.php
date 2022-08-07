<?php

namespace App\Http\Controllers\Template_10;

use App\Attribute;
use App\CategoryAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller {
    
    public function by_subcategory(Request $request) {

		$subcategory_slug = $request->subcategory_slug;
        
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
		} else {
			$category_attributes = $this->attributes_with_their_categories();
		}

		return view('template_10.catalog.attribute_filter', compact('category_attributes'))->render();
	}


}
