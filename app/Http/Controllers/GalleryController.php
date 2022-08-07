<?php

namespace App\Http\Controllers;

use App\Gallery;

use App\GalleryCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Uploaders\ImageUploader;
use Auth;

class GalleryController extends Controller {

	public function all() {
		$user = Auth::user();
		$company_id = $user->company_id;
		
		$galleries = Gallery::whereCompanyId($company_id)->get();

		return $galleries;
	}

	public function show($id) {
		$gallery = Gallery::find($id);
		return $gallery;
	}

	public function store(GalleryRequest $request) {
		$data = $request->all();
		$user = Auth::user();
		$data['slug'] = str_slug($data['title']);
		$data['published'] = true;
		
		$gallery = new Gallery();
		$gallery->fill($data);
		$gallery->company_id = $user->company_id;

		if ($request->hasFile('image')) {

			$img = $request->image;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/galleries/images', $img, 'png');

			$gallery->image = $functionUpload->getDropboxUrl();
			$gallery->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/company/galleries/images', $img, 'png', 350);
			$gallery->image_thumb = $functionUpload->getDropboxUrl();
			$gallery->image_thumb_path = $functionUpload->getDropboxPath();
		}

		$gallery->save();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado la galería.']);
	}

	public function update($id, GalleryRequest $request) {

		$data = $request->all();
		$data['slug'] = str_slug($data['title']);
		$data['published'] = true;

		$gallery = Gallery::find($id);
		$gallery->fill($data);

		if ($request->hasFile('image')) {

			$img = $request->image;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/galleries/images', $img, 'png');

			$functionUpload->delete($gallery->image_path, $gallery->image);

			$gallery->image = $functionUpload->getDropboxUrl();
			$gallery->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/company/galleries/images', $img, 'png', 350);
			$functionUpload->delete($gallery->image_thumb_path, $gallery->image_thumb);

			$gallery->image_thumb = $functionUpload->getDropboxUrl();
			$gallery->image_thumb_path = $functionUpload->getDropboxPath();
		}

		$gallery->save();
		return;
	}

	public function delete($id) {

		$gallery = Gallery::find($id);
		$functionUpload = new ImageUploader();
		$functionUpload->delete($gallery->image_path, $gallery->image);
		$functionUpload->delete($gallery->image_thumb_path, $gallery->image_thumb);
		$gallery->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado el registro'], 200);

	}

	public function update_published($id) {
		$notice = Gallery::find($id);

		$notice->published = ($notice->published == 1) ? 0 : 1;
		$notice->save();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha cambiado el estado'], 200);
	}

	public function show_view() {
		$gallery_categories = GalleryCategory::wherePublished(1)
			->with(['galleries' => function ($query) {
				$query->wherePublished(1);
			}])->get();

		$path = $this->get_current_company_path();

		return view("{$path}.gallery.index", compact('gallery_categories'));
	}

	
}
