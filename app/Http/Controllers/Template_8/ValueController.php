<?php

namespace App\Http\Controllers\Template_8;

use App\Http\Controllers\Controller;
use App\Value;

class ValueController extends Controller {

	public function show($value_id) {
		$value = Value::find($value_id);
		return $value;
	}

}
