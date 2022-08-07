<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Controllers\Controller;
use App\Uploaders\ImageUploader;

class ContentController extends Controller {
	public function delete($id) {
		$content = Content::find($id);

		$functionUpload = new ImageUploader();
		$functionUpload->delete($content->resource_path, $content->resource);
		$functionUpload->delete($content->resource_thumb_path, $content->resource_thumb);
		$content->delete();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la imagen']);
	}

	public function delete_gallery($id)
	{
		try {
			$content = Content::find($id);
			$functionUpload = new ImageUploader();
			$functionUpload->delete($content->resource_path,$content->resource);
			$functionUpload->delete($content->resource_thumb_path,$content->resource_thumb);
			$content->delete();

			return response()->json(['success'=>true],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}
	}
}
