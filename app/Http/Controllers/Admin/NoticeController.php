<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeCreateRequest;
use App\Notice;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class NoticeController extends Controller {
	public function all() {
		$notices = Notice::orderBy('id', 'DESC')->get();
		return $notices;
	}

	public function show($id) {
		$notice = Notice::find($id);
		return $notice;
	}

	public function store(NoticeCreateRequest $request) {
		$data = $request->all();
		$notice = new Notice();
		$notice->fill($data);
		$notice->slug = str_slug($data['title']);
		$notice->published = true;

		if ($request->hasFile('image')) {

			$img = $request->image;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/notices/images', $img, 'png');

			$notice->image = $functionUpload->getDropboxUrl();
			$notice->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/company/notices/images', $img, 'png', 350);
			$notice->image_thumb = $functionUpload->getDropboxUrl();
			$notice->image_thumb_path = $functionUpload->getDropboxPath();
		}
		$notice->save();
		return response()->json(['message' => 'Se ha creado el comunicado'], 201);
	}

	public function update($id, Request $request) {
		$data = $request->all();
		$notice = Notice::find($id);
		$notice->fill($data);
		$notice->slug = str_slug($data['title']);

		if ($request->hasFile('image')) {

			$img = $request->image;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/notices/images', $img, 'png');
			$functionUpload->delete($notice->image_path, $notice->image);

			$notice->image = $functionUpload->getDropboxUrl();
			$notice->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/company/notices/images', $img, 'png', 350);
			$functionUpload->delete($notice->image_thumb_path, $notice->image_thumb);
			$notice->image_thumb = $functionUpload->getDropboxUrl();
			$notice->image_thumb_path = $functionUpload->getDropboxPath();
		}

		$notice->save();

		return response()->json(['message' => 'Se ha actualizado el comunicado'], 200);
	}

	public function updatePublished($id) {
		$notice = Notice::find($id);

		$notice->published = ($notice->published == 1) ? 0 : 1;
		$notice->save();
		return;

	}

	public function delete($id) {
		$notice = Notice::find($id);
		$functionUpload = new ImageUploader();
		$functionUpload->delete($notice->image_path, $notice->image);
		$functionUpload->delete($notice->image_thumb_path, $notice->image_thumb);
		$notice->delete();
	}

	public function allForLanding() {
		$notices = Notice::wherePublished(1)
			->orderBy('id', 'DESC')
			->take(5)
			->get();

		$t = [];

		foreach ($notices as $u => $notice) {
			$t[] = array(
				'id' => $notice->id,
				'title' => $notice->title,
				'imageUrl' => $notice->image,
				'imageUrlThumb' => $notice->image_thumb,
				'link' => $notice->link,

			);
		}

		return ['data' => $t];
	}
}
