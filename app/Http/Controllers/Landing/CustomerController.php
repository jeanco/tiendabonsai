<?php

namespace App\Http\Controllers\Landing;

use App\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller {
	public function getByIdentityDocument($identity_document) {
		$customer = Customer::where('identity_document', $identity_document)->first();

		if (count($customer)) {
			$customer_array = array(
				'identityDocument' => $customer->identity_document,
				'firstName' => $customer->first_name,
				'lastName' => $customer->last_name,
				'email' => $customer->email,
				'birthday' => $customer->birthday,
				'countryId' => (int) $customer->country_id,
				'cityId' => (int) $customer->city_id,
				'whatsapp' => $customer->cel_whatsapp,
				'address' => $customer->address,
				'legalName' => $customer->legal_name,
			);

			return response()->json(['data' => $customer_array]);
		} else {
			return response()->json(['data' => []]);
		}
	}
}
