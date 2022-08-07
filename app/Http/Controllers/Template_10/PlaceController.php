<?php

namespace App\Http\Controllers\Template_10;

use App\Http\Controllers\Controller;
use App\Place;
use App\Product;
use Illuminate\Http\Request;

class PlaceController extends Controller {

	public function show($id) {
		$place = Place::find($id);
		return $place;
	}

	public function set_place(Request $request) {

		$place_id = $request->place_id;
		$request->session()->put('place_id', $place_id);

		$place = Place::find($place_id);
		$request->session()->put('place_name', $place->name);

		if ($request->product_id) {

			$product = Product::with(['unit_price' => function ($query) use ($place_id) {
				$query->wherePlaceId($place_id);
			}])->find($request->product_id);

			return $product->unit_price->price;
		}

		return;
	}

}
