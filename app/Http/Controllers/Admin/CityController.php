<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CityController extends Controller {

	public function get_provinces($id) {

		$provinces = Province::whereCountryId($id)->get();
		return $provinces;

		// $country = Country::with('cities')->find($id);
		// return $country->cities;
	}
}
