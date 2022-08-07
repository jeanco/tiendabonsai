<?php

namespace App\Http\Controllers\Website;

use App\Account;
use App\City;
use App\Country;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller {

	public function show_view() {
		$countries = Country::select('id', 'name')->get();
		$cities = City::whereCountryId($countries[0]->id)
			->select('id', 'name')
			->get();

		$accounts = Account::wherePublished(1)
			->with('payment_entity')
			->get();

		$path = $this->get_current_company_path();

		return view("{$path}.checkout.check_out", compact('countries', 'cities', 'accounts'));
	}

}
