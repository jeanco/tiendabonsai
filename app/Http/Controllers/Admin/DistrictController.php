<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;

class DistrictController extends Controller {

	public function index_by_province($ids) {

		$ids_arr = explode(',', $ids);

		$districts = District::whereIn('province_id', $ids_arr)->get();
		return $districts;

	}

	public function index_by_city($ids) {

		$ids_arr = explode(',', $ids);

		$districts = District::whereIn('city_id', $ids_arr)->get();
		return $districts;
	}

	public function index_by_country($country_id) {
		$districts = District::whereCountryId($country_id)->get();
		return $districts;
	}

}
