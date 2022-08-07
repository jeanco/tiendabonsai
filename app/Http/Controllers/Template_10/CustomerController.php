<?php

namespace App\Http\Controllers\Template_10;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller {
	public function get_customer(Request $request) {
		$customer = Customer::whereIdentityDocument($request->identity_document)
			->first();

		return $customer;
	}

	public function post_customer(Request $request) {
		#Register account
		//dd($request->email);
		$customer = Customer::whereIdentityDocument($request->dni)
				->first();
				if (count($customer)) {
					return 'false';
				}else{
						$customer = new Customer;
				$customer->identity_document = $request->dni;
				$customer->first_name = $request->first_name;
				$customer->last_name = $request->last_name;
				$customer->speciality = $request->speciality;
				$customer->message = $request->message;
				$customer->cel_whatsapp = $request->cel;
				$customer->city_id = 1;
				$customer->country_id = 1;
				$customer->email = $request->email;
				$customer->customer_type = 1;
				$customer->save();
				}

			

		return 'true';
	}

	

	public function search_certificate_view()
	{			
		return view('template_10.certificate.index');
	}

	public function search_certificates(Request $request)
	{	
		$customer = Customer::whereIdentityDocument($request->indentity_document)
			->where(function($query){
				$query->where('certificate_one', '!=', NULL)
					->orWhere('certificate_two', '!=', NULL)
					->orWhere('certificate_three', '!=', NULL)
					->orWhere('certificate_four', '!=', NULL)
					->orWhere('certificate_five', '!=', NULL)
					->orWhere('certificate_six', '!=', NULL)
					->orWhere('certificate_seven', '!=', NULL)
					->orWhere('certificate_eight', '!=', NULL)
					->orWhere('certificate_nine', '!=', NULL)
					->orWhere('certificate_ten', '!=', NULL);
			})
			->get();

		if (!count($customer)) {
			return response()->json(['title' => '', 'message' => 'No se ha encontrado certificados'], 400);
		}
		return;
	}

	public function result_search_certificate_view(Request $request)
	{			
		$customer = Customer::whereIdentityDocument($request->identity_document)
			->first();
		return view('template_10.certificate.results', compact('customer'));
	}

}
