<?php

namespace App\Http\Controllers\Website;

use App\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeCreateRequest;
use App\Http\Requests\AttributeUpdateRequest;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class AttributeController extends Controller {

	public function index(Request $request) {
		$categories = Attribute::with('category_attribute');

		if ($request->category) {
			$categories = $categories->whereCategoryAttributeId($request->category);
		}

		return $categories->get();
	}

	public function show($id) {
		$attribute = Attribute::find($id);
		return $attribute;
	}

	public function store(AttributeCreateRequest $request) {
		$new_attribute = new Attribute();
		$new_attribute->name = $request->name;
		$new_attribute->slug = str_slug($request->name);
		$new_attribute->description = $request->description;
		$new_attribute->category_attribute_id = $request->category_attribute_id;
		$new_attribute->published = $request->published;
		
		if ($request->hasFile('icon')) {
			$img = $request->icon;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/attributes', $img, 'png', 200);

			$new_attribute->icon = $functionUpload->getDropboxUrl();
			$new_attribute->icon_path = $functionUpload->getDropboxPath();
		}

		$new_attribute->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado el atributo']);
	}

	public function update($id, AttributeUpdateRequest $request) {
		$attribute = Attribute::find($id);
		$attribute->name = $request->name;
		$attribute->slug = str_slug($request->name);
		$attribute->description = $request->description;
		$attribute->category_attribute_id = $request->category_attribute_id;
		$attribute->published = $request->published;

		if ($request->hasFile('icon')) {
			$img = $request->icon;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/attributes', $img, 'png', 200);
			$functionUpload->delete($attribute->icon_path, $attribute->icon);

			$attribute->icon = $functionUpload->getDropboxUrl();
			$attribute->icon_path = $functionUpload->getDropboxPath();
		}

		$attribute->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado el atributo']);
	}

	public function delete($id) {

		$attribute = Attribute::with('products')->find($id);

		if (count($attribute->products)) {
			return response()->json(['title' => 'Error', 'message' => 'Existen productos que tienen asignado este atributo.'], 400);
		}
		$functionUpload = new ImageUploader();
		$functionUpload->delete($attribute->icon_path, $attribute->icon);

		$attribute->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado el atributo']);
	}
}
