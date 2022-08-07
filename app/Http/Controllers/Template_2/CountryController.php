<?php

namespace App\Http\Controllers\Template_2;

use App\City;
use App\District;
use App\Http\Controllers\Controller;
use App\Place;
use App\Province;
use Illuminate\Http\Request;

class CountryController extends Controller {

	public function cities($country_id, Request $request) {

		$place = Place::first();
		$place_id = $request->session()->get('place_id', $place->id);
		$place = Place::find($place_id);

		// $cities = City::whereCountryId($country_id)
		// 	->get();
		$cities = City::whereCountryId($country_id)
			->where('id', $place->city_id)
			->get();

		return $cities;
	}

	public function provinces($city_id, Request $request) {

		$place = Place::first();
		$place_id = $request->session()->get('place_id', $place->id);
		$place = Place::find($place_id);

		// $provinces = Province::whereCityId($city_id)
		// 	->get();
		$provinces = Province::whereCityId($city_id)
			->where('id', $place->province_id)
			->get();

		return $provinces;
	}

	public function districts($province_id) {

		$districts = District::whereProvinceId($province_id)
			->get();

		return $districts;
	}

}
