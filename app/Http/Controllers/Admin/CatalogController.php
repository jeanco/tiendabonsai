<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Catalog;
use App\Http\Controllers\Controller;
use App\Uploaders\ImageUploader;
use Auth;
use Illuminate\Http\Request;

class CatalogController extends Controller {
	public function all() {

		$company_id = Auth::user()->company_id;

		$catalogs = Catalog::whereCompanyId($company_id)
			->get();

		return $catalogs;
	}

	public function show($id) {
		$catalog = Catalog::find($id);
		return $catalog;
	}

	public function store(Request $request) {

		$user = Auth::user();

		$data = $request->all();

		$catalog = new Catalog();
		$catalog->fill($data);
		$catalog->published = true;
		$catalog->user_id = $user->id;
		$catalog->company_id = $user->company_id;

		$functionUpload = new ImageUploader();

		if ($request->hasFile('image_desktop')) {

			$img = $request->image_desktop;

			$functionUpload->upload('/catalogs/images', $img, 'png', 1200);

			$catalog->image_desktop = $functionUpload->getDropboxUrl();
			$catalog->image_desktop_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('image_movil')) {

			$img_thumb = $request->image_movil;

			$functionUpload->upload('/catalogs/images', $img_thumb, 'png', 450);
			$catalog->image_movil = $functionUpload->getDropboxUrl();
			$catalog->image_movil_path = $functionUpload->getDropboxPath();
		}

		$catalog->save();
		return;
	}

	public function update($id, Request $request) {
		$data = $request->all();
		$catalog = Catalog::find($id);
		$catalog->fill($data);

		$functionUpload = new ImageUploader();

		if ($request->hasFile('image_desktop')) {

			$img = $request->image_desktop;

			$functionUpload->upload('/catalogs/images', $img, 'png', 1200);
			$functionUpload->delete($catalog->image_desktop_path, $catalog->image_desktop);
			$catalog->image_desktop = $functionUpload->getDropboxUrl();
			$catalog->image_desktop_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('image_movil')) {

			$img_thumb = $request->image_movil;

			$functionUpload->upload('/catalogs/images', $img_thumb, 'png', 700);
			$functionUpload->delete($catalog->image_movil_path, $catalog->image_movil);
			$catalog->image_movil = $functionUpload->getDropboxUrl();
			$catalog->image_movil_path = $functionUpload->getDropboxPath();
		}

		$catalog->save();
		return;
	}

	public function updatePublished($id) {
		$catalog = Catalog::find($id);
		$catalog->published = ($catalog->published == 1) ? 0 : 1;
		$catalog->save();
		return;
	}

	public function delete($id) {
		$catalog = Catalog::find($id);
		$functionUpload = new ImageUploader();
		$functionUpload->delete($catalog->image_desktop_path, $catalog->image_desktop);
		$functionUpload->delete($catalog->image_movil_path, $catalog->image_movil);
		$catalog->delete();
		return;

	}
}
