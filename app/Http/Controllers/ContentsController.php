<?php

namespace App\Http\Controllers;

use App\Content;
use App\Product;
use App\ProductPresentation;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class ContentsController extends Controller {
	public function getContentsOfAItem($modelId, $modelType, $type) {
		$images = Content::where('model_id', $modelId)->where('model_type', $modelType)->where('type', $type)->orderBy('id', 'DESC')->get();
		return response()->json(['images' => $images], 200);
	}

	public function getContentById($contentId) {
		$content = Content::find($contentId);
		return response()->json(['content' => $content], 200);
	}

	public function deleteContent(Request $request) {
		try {
			$content = Content::find($request->contentId);
			$functionUpload = new ImageUploader();
			$functionUpload->delete($content->resource_path, $content->resource);
			$functionUpload->delete($content->resource_thumb_path, $content->resource_thumb);
			$content->delete();

			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function postChangeModelId(Request $request) {
		try {

			$product = Product::find($request->modelId);

			$content = Content::find($request->contentId);
			$content->model_id = $request->modelId;
			$content->type = $request->type;
			$content->color_id = 0;

			//corregir

			if (count($content)==0) {
				if (!$product->is_main_product) {

				$presentation = ProductPresentation::whereProductId($product->id)
					->where('main_product_id', $product->main_product_id)
					->first();

				$content->model_id = $product->main_product_id;
				if (isset( $presentation->color_id)) {
					$content->color_id = $presentation->color_id;
				}
				
			}
			}

			



			$content->save();

			//Convierto el objeto a un array de objetos, ya que es enviada a una function general,
			//el cual recibe SÓLO array de objetos
			$images = [];
			$images[0] = $content;

			return response()->json(['success' => true, 'images' => $images], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function postChangeModelId_gallery(Request $request)
	{
		try {
			$content = Content::find($request->contentId);
			$content->model_id = $request->modelId;
			$content->save();

			//Convierto el objeto a un array de objetos, ya que es enviada a una function general,
			//el cual recibe SÓLO array de objetos
			$images = [];
			$images[0] = $content;

			return response()->json(['success'=>true,'images'=>$images],200);
		} catch (Exception $e) {
			return response()->json(['success'=>false],200);
		}

	}

	public function update_description($id, Request $request) {

		$content = Content::find($id);
		$content->content = $request->content;
		$content->save();

		return response()->json(['message' => 'Se ha actualizado la descripción'], 200);

	}
}
