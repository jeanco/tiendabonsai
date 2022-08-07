<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogisticSaveRequest;
use App\Logistic;

//use App\Http\Requests\PlaceRequest;
//use App\Http\Requests\PlaceUpdateRequest;

class LogisticController extends Controller {

	public function index() {
		$logistics = Logistic::all();
		return $logistics;
	}

	public function show($id) {
		$logistic = Logistic::with('costs')->find($id);
		return $logistic;
	}

	public function store(LogisticSaveRequest $request) {

		$data = $request->all();
		$new_logistic = new Logistic();
		$new_logistic->fill($data);
		$new_logistic->save();

		return response()->json(['title' => '', 'message' => 'Se ha creado'], 201);
	}

	public function update($id, LogisticSaveRequest $request) {

		$data = $request->all();

		$logistic = Logistic::find($id);
		$logistic->fill($data);
		$logistic->save();

		return response()->json(['title' => '', 'message' => 'Se ha actualizado'], 200);
	}

	public function delete($id) {

		$logistic = Logistic::find($id);

		// if (count($logistic->prices)) {
		// 	return response()->json(['title' => '', 'message' => 'No se ha podido eliminar.'], 400);
		// }
		$logistic->delete();

		return response()->json(['title' => '', 'message' => 'Se ha eliminado.'], 200);

	}

}
