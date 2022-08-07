<?php

namespace App\Http\Controllers\Template_11;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Session;

class CurrencyController extends Controller {

	public function get_currency()
	{
		return Session::get('currency_id');
	}

	public function update($id) {

		// DB::table('currencies')
		// 	->update(['default_currency' => 0]);

		// DB::table('currencies')
		// 	->where('id', $id)
		// 	->update(['default_currency' => 1]);
		Session::put('currency_id', $id);

		return redirect()->back();
	}

}
