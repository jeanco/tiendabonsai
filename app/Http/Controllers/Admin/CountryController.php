<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;

class CountryController extends Controller {
	public function all() {
		$countries = Country::all();
		return $countries;
	}

	public function getCities($id) {

		$cities = City::whereCountryId($id)->get();
		return $cities;

		// $country = Country::with('cities')->find($id);
		// return $country->cities;
	}
}
