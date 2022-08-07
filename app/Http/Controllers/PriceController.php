<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Price;
use App\Product;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class PriceController extends Controller {
	public function store(Request $request) {

		$data = $request->except('etiquette');

		$exist = Price::whereType($data['type'])
			->whereProductId($data['product_id'])
			->wherePlaceId($data['place_id'])
			->get();

		if (count($exist)) {
			return response()->json(['title' => 'Advertencia', 'message' => 'Ya existe un precio similar'], 400);
		}

		$data['name'] = '-';
		$new_price = new Price();
		$new_price->fill($data);

		if ($request->has('etiquette')) {
            $img = $request->etiquette;

            $functionUpload = new ImageUploader();
            $functionUpload->upload('/company/prices',$img,'png',400);

            $new_price->etiquette = $functionUpload->getDropboxUrl();
            $new_price->etiquette_path = $functionUpload->getDropboxPath();
		}

		$new_price->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha guardado el precio', 'id' => $new_price->id], 201);
	}

	public function update($id, Request $request) {

		$data = $request->except('etiquette');

		$price = Price::find($id);

		$exist = Price::whereType($data['type'])
			->whereProductId($price->product_id)
			->where('id', '!=', $id)
			->wherePlaceId($price->place_id)
			->get();

		if (count($exist)) {
			return response()->json(['title' => 'Advertencia', 'message' => 'Ya existe un precio similar'], 400);
		}

		$price->fill($data);

		if ($request->has('etiquette')) {
            $img = $request->etiquette;

            $functionUpload = new ImageUploader();
            $functionUpload->upload('/company/prices',$img,'png',400);
	        $functionUpload->delete($price->etiquette_path, $price->etiquette);

            $price->etiquette = $functionUpload->getDropboxUrl();
            $price->etiquette_path = $functionUpload->getDropboxPath();
		}

		
		if ($price->save()) {

			if ($price->type == 1) {
				$product = Product::find($price->product_id);
				$product->price = $price->price;
				$product->save();
			}
			
		}

		


		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado el precio'], 200);
	}

	public function delete($id) {
		$price = Price::find($id);

		if ($price->etiquette_path) {
	        $functionUpload = new ImageUploader();
	        $functionUpload->delete($price->etiquette_path, $price->etiquette);
		}

		$price->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado el precio'], 200);
	}

	public function delete_etiquette($id)
	{
		$price = Price::find($id);

		if ($price->etiquette_path) {
	        $functionUpload = new ImageUploader();
	        $functionUpload->delete($price->etiquette_path, $price->etiquette);

	        $price->etiquette_path = "";
	        $price->etiquette = "";
	        $price->save();

		}

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado la imágen'], 200);	
	}

	public function get_price(Request $request) {

		$product_id = $request->index;
		$quantity = $request->quantity;

		$product = Product::find($product_id);

		$price = Price::whereProductId($product_id)
			->orderBy('min_quantity', 'DESC')
			->where('min_quantity', '<=', $quantity)
			->whereStatus(1)
			->first();

		if (count($price)) {
			return $price->price;
		}
		return $product->price;
	}

}
