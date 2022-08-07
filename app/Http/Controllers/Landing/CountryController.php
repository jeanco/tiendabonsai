<?php

namespace App\Http\Controllers\Landing;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;

class CountryController extends Controller {
	public function all() {
		$countries = Country::with('cities')->get();

		$t = [];

		foreach ($countries as $i => $country) {
			$cities = [];

			foreach ($country->cities as $key => $city) {
				$cities[] = array(
					'id' => $city->id,
					'name' => $city->name,
				);
			}

			$t[] = array(
				'id' => $country->id,
				'name' => $country->name,
				'cities' => $cities,
			);
		}

		return ['data' => $t];
	}

	public function getCities($id) {
		$cities = City::where('country_id', $id)->get();

		$t = [];

		foreach ($cities as $key => $city) {
			$t[] = array(
				'id' => $city->id,
				'name' => $city->name,
			);
		}

		return ['data' => $t];
	}
}
