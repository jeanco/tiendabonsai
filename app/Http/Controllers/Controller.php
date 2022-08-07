<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Product;
use App\Campaign;
use App\Category;
use App\Attribute;
use App\Subcategory;
use App\Entities\Catalog;
use App\CategoryAttribute;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use View;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct() {

	}

	public function categories_with_their_subcategories() {

		$categories = Category::wherePublished(1)
			->select(['id', 'name', 'icon', 'slug'])
			->with(['subcategories' => function ($query) {
				$query->select(['id', 'category_id', 'name', 'slug']);
			}])
			->get();

		return $categories;
	}

	public function subcategories() {
		$subcategories = Subcategory::wherePublished(1)
			->get();

		return $subcategories;

	}

	public function catalogs($company_id) {

		$coverImages = Catalog::where('published', 1)
			->whereCompanyId($company_id)
			->get();
		$arrayImages = [];

		foreach ($coverImages as $i => $campaign) {
			$arrayImages[] = array(
				'title' => $campaign->title,
				'content' => '',
				'imageUrl' => $campaign->image_desktop, //Imagen Desktop
				'imageUrlThumb' => $campaign->image_movil, //Imagen Celular
				'linkUrl' => ($campaign->link ? $campaign->link : "#"),
				// 'isBlank' => true,
			);
		}
		return $arrayImages;

	}

	public function covers() {

		$coverImages = Campaign::where('published', 1)->get();
		$arrayImages = [];

		foreach ($coverImages as $i => $campaign) {
			$arrayImages[] = array(
				'title' => $campaign->title,
				'content' => $campaign->content,
				'imageUrl' => $campaign->image, //Imagen Desktop
				'imageUrlThumb' => $campaign->image_thumb, //Imagen Celular
				'linkUrl' => ($campaign->link ? $campaign->link : "#"),
				'linkText' => $campaign->link_text,
				'subtitle' => $campaign->subtitle,
				// 'isBlank' => true,
			);
		}
		return $arrayImages;
	}

	public function offers() {

		$products = Product::where('published', 1)
			->where('promotion_available', true)
			->where('outstanding_promotion', true)
			->orderBy('updated_at', 'DESC')
			->take(6)
			->get();

		$arrayBlock = [];

		foreach ($products as $i => $product) {
			$arrayBlock[] = array(
				'offerTitle' => $product->promotion_title,
				'itemSlug' => $product->slug,
				'imageUrl' => (count($product->promotion_image) ? $product->promotion_image : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
				'imageThumbUrl' => (count($product->promotion_image_thumb) ? $product->promotion_image_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
			);
		}

		return $arrayBlock;

	}

	public function attributes_of_the_category($category_id) {

		$attributes = Attribute::whereCategoryAttributeId($category_id)
			->wherePublished(1)
			->select(['id', 'slug', 'name'])
			->get();

		return $attributes;
	}

	// public function getRandomImage($model_id, $model_type, $different_of) {
	// 	$random_image = Content::where('model_type', $model_type)
	// 		->where('type', 1)
	// 		->where('model_id', $model_id)
	// 		->where('id', '!=', $different_of)
	// 		->first();

	// 	return $random_image;
	// }

	// public function getOneRandomImage($modelId, $modelType, $differentOf) {
	// 	// $image = DB::table('contents');
	// 	$image = Content::inRandomOrder();
	// 	if ($modelId) {
	// 		$image = $image->where('model_id', $modelId);
	// 	}
	// 	$image = $image->where('model_type', $modelType)
	// 		->where('type', 1)
	// 		->where('id', '!=', $differentOf)
	// 		->take(1)
	// 		->first();
	// 	return $image;
	// }

	// public function getArrayImages($modelId, $modelType) {
	// 	$arrayImages = [];
	// 	$images = Content::select(['resource'])
	// 		->where('model_id', $modelId)
	// 		->where('model_type', $modelType)
	// 		->where('type', 1)
	// 		->get();

	// 	if (count($images)) {
	// 		foreach ($images as $key => $image) {
	// 			$arrayImages[$key] = $image->resource;
	// 		}
	// 	}
	// 	return $arrayImages;
	// }

	// public function getVideos($modelId, $modelType) {
	// 	$videos = Content::select(['content', 'resource'])
	// 		->where('model_id', $modelId)
	// 		->where('model_type', $modelType)
	// 		->where('type', 2)
	// 		->get();

	// 	if (count($videos)) {
	// 		foreach ($videos as $key => $video) {
	// 			$videoArray = explode("=", $video->resource);
	// 			if (count($videoArray) > 1) {
	// 				$video->resource = $videoArray[1];
	// 			}
	// 		}
	// 		return $videos;
	// 	}
	// 	return $videos;
	// }

	// public function getServices() {
	// 	$services = Service::where('published', 1)->get();
	// 	return $services;
	// }

	// //Borrar categoria
	// public function deleteCategory(Request $request) {
	// 	try {
	// 		$category = Category::find($request->categoryId);
	// 		$this->deleteSubcategoriesByCategory($category->id);
	// 		$category->delete();

	// 		return response()->json(['success' => true], 200);
	// 	} catch (Exception $e) {
	// 		return response()->json(['success' => false], 200);
	// 	}
	// }

	// public function deleteSubcategoriesByCategory($categoryId) {
	// 	$subcategories = Subcategory::where('category_id', $categoryId)->get();

	// 	foreach ($subcategories as $i => $subcategory) {
	// 		$this->deleteProductsBySubcategory($subcategory->id);
	// 		$subcategory->delete();
	// 	}
	// }

	// public function deleteSubcategory(Request $request) {
	// 	try {
	// 		$subcategory = Subcategory::find($request->subcategoryId);
	// 		$this->deleteProductsBySubcategory($subcategory->id);
	// 		$subcategory->delete();
	// 		return response()->json(['success' => true], 200);
	// 	} catch (Exception $e) {
	// 		return response()->json(['success' => false], 200);
	// 	}
	// }

	// // public function deleteOrderProductBySubcategory($subcategoryId)
	// // {
	// //     $products = $this->getProductsBySubcategoryWithOutDataJson($subcategoryId);
	// //
	// //     foreach ($products as $k => $product) {
	// //         $product->orders()->detach();
	// //     }
	// // }

	// public function deleteProductsBySubcategory($subcategoryId) {
	// 	$products = Product::where('subcategory_id', $subcategoryId)->get();
	// 	foreach ($products as $i => $product) {

	// 		$functionUploadPdf = new PdfUploader();
	// 		$functionUploadPdf->delete($product->pdf_path, $product->pdf);

	// 		$images = Content::where('model_id', $product->id)
	// 			->where('model_type', 2)
	// 			->where('type', 1)
	// 			->get();

	// 		$functionUploadImage = new ImageUploader();

	// 		foreach ($images as $i => $image) {
	// 			$functionUploadImage->delete($image->resource_thumb_path, $image->resource_thumb);
	// 			$functionUploadImage->delete($image->resource_path, $image->resource);
	// 			$image->delete();
	// 		}

	// 		$product->delete();
	// 	}
	// }

	// public function checkImageSize($img, $widthVal, $heightVal) {
	// 	$data = getimagesize($img);
	// 	$width = $data[0];
	// 	$height = $data[1];

	// 	if ($width == $widthVal && $height == $heightVal) {
	// 		return true;
	// 	}

	// 	return false;
	// }
	public function get_current_company_path() {
		$project_active_path = DB::table('projects')
			->where('status', 1)
			->first();
		return $project_active_path->path;
	}

	public function attributes_with_their_categories() {

		$categories = CategoryAttribute::whereHas('attributes_relationship', function($query){
			$query->wherePublished(1);
		})->with(['attributes_relationship' => function ($query) {
			$query->wherePublished(1);
		}])->wherePublished(1)
			->get();

		return $categories;

	}

	public function next_number($value){
		$ceros = "";

		$tam = strlen($value);
		$x = (float)$value;
		$x++;
		$x = strval($x);
		$new_tam = strlen($x);
		$cant_ceros = $tam-$new_tam;

		for ($i=0; $i < $cant_ceros ; $i++) {
			$ceros += "0";
		}

		return $ceros.$x;
	}

	// function sigNumero(value) {
	// 	var tam, x, new_tam, cant_ceros, ceros = "";
	// 	tam = value.length;
	// 	x = parseFloat(value);
	// 	x++;
	// 	x = x.toString();
	// 	//console.log("000000"+x);
	// 	new_tam = x.length;
	// 	cant_ceros = tam - new_tam;

	// 	for (var i = 0; i < cant_ceros; i++) {
	// 	  ceros = ceros + "0";
	// 	}
	// 	return (ceros + "" + x);
	//   }

}
