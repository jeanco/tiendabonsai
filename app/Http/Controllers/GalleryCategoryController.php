<?php

namespace App\Http\Controllers;

use App\GalleryCategory;
use App\Http\Controllers\Controller;

class GalleryCategoryController extends Controller {

	// public function all() {
	// 	$categories = EvidenceCategory::all();
	// 	return $categories;
	// }

	public function index() {
		$categories = GalleryCategory::select(['id', 'name'])
			->wherePublished(1)
			->get();

		return $categories;
	}

	// public function store(EvidenceCategoryCreateRequest $request) {

	// 	$data = $request->all();
	// 	$data['slug'] = str_slug($data['name']);
	// 	$data['published'] = 1;

	// 	$evidence_category = new EvidenceCategory();
	// 	$evidence_category->fill($data);
	// 	$evidence_category->save();

	// 	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado la categoría'], 201);
	// }

}
