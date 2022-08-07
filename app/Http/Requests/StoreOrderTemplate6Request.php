<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreOrderTemplate6Request extends FormRequest {
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
				return [
					//'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					//'email' => 'required|email',
					//'first_name' => 'required',
					//'last_name' => 'required',
					'nick_name' => 'required',
					'phone' => 'required|min:6',
					//'address' => 'required',
					//'birthday' => 'required',
					//'document_type' => 'required',
				];

		} else {
			#DNI
				return [
					//'identity_document' => 'required|min:8',
					// 'email' => 'required|email|unique:customers,email',
					//'email' => 'required|email',
					//'first_name' => 'required',
					//'last_name' => 'required',
					'nick_name' => 'required',
					'phone' => 'required|min:6',
					//'address' => 'required',
					//'birthday' => 'required',
					//'document_type' => 'required',
				];


		}
	}
}
