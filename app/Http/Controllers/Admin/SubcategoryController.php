<?php

namespace App\Http\Controllers\Admin;

use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryCreateRequest;
use App\Http\Requests\SubcategoryUpdateRequest;
use App\Product;
use App\Subcategory;
use App\Uploaders\ImageUploader;

class SubcategoryController extends Controller {
	public function all() {
		$subcategories = Subcategory::all();
		return $subcategories;
	}

	public function show($id) {
		$subcategories = Subcategory::find($id);
		return $subcategories;
	}

	public function get_products($id) {

		$products = Product::wherePublished(1)
			->whereSubcategoryId($id)
			->get();

		return $products;
	}

	public function getAttributes($subcategory_id) {
		$subcategory = Subcategory::with('attributes')->find($subcategory_id);
		return $subcategory->attributes;
	}

	public function getCategoriesAttributes($subcategory_id) {
		$categories_attribute = CategoryAttribute::whereHas('attributes_relationship', function ($query) use ($subcategory_id) {
			$query->whereHas('subcategories', function ($query) use ($subcategory_id) {
				$query->where('subcategories.id', $subcategory_id);
			});
		})
			->with(['attributes_relationship' => function ($query) use ($subcategory_id) {
				$query->whereHas('subcategories', function ($query) use ($subcategory_id) {
					$query->where('subcategories.id', $subcategory_id);
				});
			}])
			->get();

		return $categories_attribute;
	}

	public function store(SubcategoryCreateRequest $request) {
		$data = $request->all();
		$subcategory = new Subcategory();
		$subcategory->fill($data);
		$subcategory->slug = str_slug($data['name']);
		$subcategory->save();

		$categories_attributes = CategoryAttribute::all();

		foreach ($categories_attributes as $key => $category) {
			$values = $request->input("values_category_$category->id");

			if ($values) {
				foreach ($values as $i => $attribute_id) {
					$subcategory->attributes()->attach($attribute_id, ['category_id' => $subcategory->category_id]);
				}
			}
		}
		return;
	}

	public function update($id, SubcategoryUpdateRequest $request) {
		$data = $request->all();
		$subcategory = Subcategory::find($id);
		$subcategory->fill($data);
		$subcategory->slug = str_slug($data['name']);

		$functionUpload = new ImageUploader();

		if ($request->hasFile('subcategory_image')) {

			$img = $request->subcategory_image;

			$functionUpload->upload('/categories', $img, 'png', 600);
			$functionUpload->delete($subcategory->image_path, $subcategory->image);

			$subcategory->image = $functionUpload->getDropboxUrl();
			$subcategory->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/categories', $img, 'png', 300);
			$functionUpload->delete($subcategory->image_thumb_path, $subcategory->image_thumb);
			$subcategory->image_thumb = $functionUpload->getDropboxUrl();
			$subcategory->image_thumb_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('subcategory_icon')) {

			$icon = $request->subcategory_icon;

			$functionUpload->upload('/categories', $icon, 'png', 100);
			$functionUpload->delete($subcategory->icon_path, $subcategory->icon);

			$subcategory->icon = $functionUpload->getDropboxUrl();
			$subcategory->icon_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('subcategory_icon_white')) {

			$icon_white = $request->subcategory_icon_white;

			$functionUpload->upload('/categories', $icon_white, 'png', 450);
			$functionUpload->delete($subcategory->icon_white_path, $subcategory->icon_white);

			$subcategory->icon_white = $functionUpload->getDropboxUrl();
			$subcategory->icon_white_path = $functionUpload->getDropboxPath();
		}


		$subcategory->save();

		$categories_attributes = CategoryAttribute::all();
		$subcategory->attributes()->detach();
		foreach ($categories_attributes as $key => $category) {
			$values = $request->input("values_category_$category->id");
			if ($values) {
				foreach ($values as $i => $attribute_id) {
					$subcategory->attributes()->attach($attribute_id, ['category_id' => $subcategory->category_id]);
				}
			}
		}

		return;
	}

	public function delete($id) {
		$subcategory = Subcategory::with('products')->find($id);

		if (count($subcategory->products)) {
			return response()->json(['success' => false, 'message' => 'Esta subcategoría tiene productos'], 400);
		}

		$subcategory->delete();
		return;
	}

	public function show_all_published_by_category($category_id) {

		$subcategories = Subcategory::wherePublished(1)
			->whereCategoryId($category_id)
			->get();

		return $subcategories;

	}

}
