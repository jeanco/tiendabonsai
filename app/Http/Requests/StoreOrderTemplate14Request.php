<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreOrderTemplate14Request extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Request $request) {



	
		if (Auth::check()) {
			#DNI
			if ($request->document_type == 1 && $request->with_invoice == "true" ) {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					//'email' => 'required|email',
					'first_name' => 'required',
					'last_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',

					//para cheked invoice

					'business_document' => 'required|min:8',
					'business_name_social' => 'required',
					'business_address' => 'required',
				];
			}else{


				if ($request->document_type == 1) {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					//'email' => 'required|email',
					'first_name' => 'required',
					'last_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',
				];
			}

			}

			#RUC
			if ($request->document_type == 2 && $request->with_invoice == "true") {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					//'email' => 'required|email',
					'business_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',

					//para cheked invoice

					'business_document' => 'required|min:8',
					'business_name_social' => 'required',
					'business_address' => 'required',
				];
			}else{

				if ($request->document_type == 2) {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					//'email' => 'required|email',
					'business_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',
				];
			}



			}
			// return [
			// 	'identity_document' => 'required',
			// 	'first_name' => 'required',
			// 	//'last_name' => 'required',
			// 	'phone' => 'required',
			// 	'birthday' => 'required',
			// 	'document_type' => 'required',
			// ];
		} else {
			#DNI
			if ($request->document_type == 1 && $request->with_invoice == "true") {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					'email' => 'required|email',
					'password' => 'required|min:8',
					'first_name' => 'required',
					'last_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',

					//para cheked invoice

					'business_document' => 'required|min:8',
					'business_name_social' => 'required',
					'business_address' => 'required',
				];
			}else{

				if ($request->document_type == 1 ) {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					'email' => 'required|email',
					'password' => 'required|min:8',
					'first_name' => 'required',
					'last_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',
				];
			}
			}

			#RUC
			if ($request->document_type == 2 && $request->with_invoice == "true") {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					'email' => 'required|email',
					'password' => 'required|min:8',
					'business_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',

					//para cheked invoice

					'business_document' => 'required|min:8',
					'business_name_social' => 'required',
					'business_address' => 'required',
				];
			}else{

				if ($request->document_type == 2 ) {
				return [
					'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					'email' => 'required|email',
					'password' => 'required|min:8',
					'business_name' => 'required',
					'phone' => 'required|min:6',
					'birthday' => 'required',
					'document_type' => 'required',
				];
			}

			}
			// return [
			// 	'identity_document' => 'required',
			// 	// 'email' => 'required|email|unique:customers,email',
			// 	'email' => 'required|email',
			// 	'password' => 'required|min:8',
			// 	'first_name' => 'required',
			// 	//'last_name' => 'required',
			// 	'phone' => 'required',
			// 	'birthday' => 'required',
			// 	'document_type' => 'required',
			// ];
		}

		

	}
}
