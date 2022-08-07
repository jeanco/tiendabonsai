<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Culqi\Culqi;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller {

	public function show_view() {
		//$countries = Country::select('id', 'name')->get();
		//$cities = City::whereCountryId($countries[0]->id)
		//->select('id', 'name')
		//->get();

		//$accounts = Account::wherePublished(1)
		//	->with('payment_entity')
		//	->get();

		$path = $this->get_current_company_path();

		//return view("{$path}.checkout.payment_gateway", compact('countries', 'cities', 'accounts'));
		return view("{$path}.checkout.payment_gateway");
	}

	public function charge(Request $request) {

		//$SECRET_KEY = "sk_test_ZivyviFXqtCzayFX";
		$SECRET_KEY = "sk_test_b7e3fd8142a1981e";
		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		$charge = $culqi->Charges->create(
			array(
				"amount" => 3000,
				"currency_code" => "PEN",
				"email" => "test@culqi.com",
				"source_id" => $request->token_example,
			)
		);

		return response()->json($charge);
	}

}
