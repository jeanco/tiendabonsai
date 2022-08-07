<?php

namespace App\Http\Controllers\Website;

use App\Entities\CompanyCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyCategoryRequest;
use App\Http\Requests\CompanyCategoryUpdateRequest;

class CompanyCategoryController extends Controller {

	public function all() {
		$categories = CompanyCategory::all();
		return $categories;

	}

	public function show($id) {
		$category = CompanyCategory::find($id);
		return $category;
	}

	public function store(CompanyCategoryRequest $request) {

		$data = $request->all();

		$new_category = new CompanyCategory();
		$new_category->slug = str_slug($data['name']);
		$new_category->fill($data);
		$new_category->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado la categoría de compañía'], 201);

	}

	public function update($id, CompanyCategoryUpdateRequest $request) {

		$data = $request->all();

		$category = CompanyCategory::find($id);
		$category->fill($data);
		$category->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado la categoría de compañía'], 200);
	}

	public function delete($id) {
		$category = CompanyCategory::with('companies')->find($id);

		if (count($category->companies)) {
			return response()->json(['title' => 'Error', 'message' => 'Existe compañías registradas con esta categoría.'], 400);
		}

		$category->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la categoría.'], 200);

	}

}
