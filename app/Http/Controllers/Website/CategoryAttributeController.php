<?php

namespace App\Http\Controllers\Website;

use App\Attribute;
use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeCategoryRequest;
use App\Http\Requests\AttributeCategoryUpdateRequest;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class CategoryAttributeController extends Controller {

	public function index() {
		$categories = CategoryAttribute::all();
		return $categories;
	}

	public function show($id) {
		$category = CategoryAttribute::find($id);
		return $category;
	}

	public function store(AttributeCategoryRequest $request) {

		$data = $request->all();

		$new_category = new CategoryAttribute();
		$new_category->slug = str_slug($data['name']);
		$new_category->fill($data);

		if ($request->hasFile('icon')) {
			$img = $request->file('icon');
			$ext = $img->getClientOriginalExtension();

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/attribute-categories/icons', $img, $ext, 300);

			$new_category->icon = $functionUpload->getDropboxUrl();
			$new_category->icon_path = $functionUpload->getDropboxPath();

		}

		$new_category->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado una nueva categoría'], 201);
	}

	public function update($id, AttributeCategoryUpdateRequest $request) {

		$data = $request->all();

		$category = CategoryAttribute::find($id);
		$category->slug = str_slug($data['name']);
		$category->fill($data);

		if ($request->hasFile('icon')) {
			$img = $request->file('icon');
			$ext = $img->getClientOriginalExtension();

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/attribute-categories/icons', $img, $ext, 300);
			$functionUpload->delete($category->icon_path, $category->icon);

			$category->icon = $functionUpload->getDropboxUrl();
			$category->icon_path = $functionUpload->getDropboxPath();
		}

		$category->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado la categoría'], 200);

	}

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

		return view('website.catalog.category_attribute_filter', compact('category_attributes'))->render();
	}

	public function delete($id) {
		$category = CategoryAttribute::find($id);

		$attributes = Attribute::whereHas('products')
			->where('category_attribute_id', $id)
			->get();

		if (count($attributes)) {
			return response()->json(['title' => 'Error', 'message' => 'Existen productos que tienen asignado atributos de esta categoría'], 400);
		}

		$attributes = Attribute::where('category_attribute_id', $id)
			->get();

		$functionUpload = new ImageUploader();

		foreach ($attributes as $key => $attribute) {
			$functionUpload->delete($attribute->icon_path, $attribute->icon);
			$attribute->delete();
		}

		$functionUpload->delete($category->icon_path, $category->icon);
		$category->delete();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la categoría']);
	}
}
