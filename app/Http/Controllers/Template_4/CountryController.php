<?php

namespace App\Http\Controllers\Template_4;

use App\City;
use App\District;
use App\Http\Controllers\Controller;
use App\Province;

class CountryController extends Controller {

	public function cities($country_id) {

		$cities = City::whereCountryId($country_id)
			->get();

		return $cities;
	}

	public function provinces($city_id) {

		$provinces = Province::whereCityId($city_id)
			->get();

		return $provinces;
	}

	public function districts($province_id) {

		$districts = District::whereProvinceId($province_id)
			->get();

		return $districts;
	}

}
