<?php

namespace App\Http\Controllers\Template_6;

use App\Cost;
use App\Http\Controllers\Controller;
use DB;

class DistrictController extends Controller {

	public function get_shipping_cost($district_id) {
		$cost_district = DB::table('cost_district')
			->where('district_id', $district_id)
			->first();

		if (!count($cost_district)) {
			return response()->json(['title' => 'Error', 'message' => 'No se pueden hacer envíos a ese destino'], 400);
		}

		$cost = Cost::find($cost_district->cost_id);

		return $cost->cost;

	}

}
