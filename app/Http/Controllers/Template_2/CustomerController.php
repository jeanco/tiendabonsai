<?php

namespace App\Http\Controllers\Template_2;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller {
	public function get_customer(Request $request) {
		$customer = Customer::whereIdentityDocument($request->identity_document)
			->first();

		return $customer;

	}

}
