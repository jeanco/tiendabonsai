<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Province;

class ProvinceController extends Controller {

	public function index_by_city($ids) {

		$ids_arr = explode(',', $ids);

		$provinces = Province::whereIn('city_id', $ids_arr)->get();
		return $provinces;

	}

	public function index_by_country($country_id) {
		$provinces = Province::whereCountryId($country_id)->get();
		return $provinces;
	}

}
