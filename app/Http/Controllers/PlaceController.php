<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PlaceUpdateRequest;
use App\Place;

class PlaceController extends Controller {

	public function index() {
		$places = Place::all();
		return $places;
	}

	public function show($id) {
		$place = Place::find($id);
		return $place;
	}

	public function store(PlaceRequest $request) {

		$data = $request->all();

		$new_place = new Place();
		$new_place->fill($data);
		$new_place->save();

		return response()->json(['title' => '', 'message' => 'Se ha creado la sede'], 201);
	}

	public function update($id, PlaceUpdateRequest $request) {

		$data = $request->all();

		$place = Place::find($id);
		$place->fill($data);
		$place->save();

		return response()->json(['title' => '', 'message' => 'Se ha actualizado la sede'], 200);
	}

	public function delete($id) {

		$place = Place::with('prices')->find($id);

		if (count($place->prices)) {
			return response()->json(['title' => '', 'message' => 'No se ha podido eliminar. Esta sede contiene precios'], 400);
		}

		$place->delete();

		return response()->json(['title' => '', 'message' => 'Se ha eliminado la sede'], 200);

	}

}
