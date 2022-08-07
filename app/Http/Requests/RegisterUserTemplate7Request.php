<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterUserTemplate7Request extends FormRequest {
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
		if ($request->document_type == 1) {
			return [
				'email' => "required|email|unique:customers,email,null,id,deleted_at,NULL",
				'identity_document' => "required|min:8|unique:customers,identity_document,null,id,deleted_at,NULL",
				'first_name' => 'required',
				'last_name' => 'required',
				'address' => 'required',
				'cel_whatsapp' => 'required|min:6',
				'password' => 'required|alpha_num|min:8|confirmed',
				'password_confirmation' => 'required|alpha_num|min:8',
			];
		}

		#RUC
		if ($request->document_type == 2) {
			return [
				'email' => "required|email|unique:customers,email,null,id,deleted_at,NULL",
				'password' => 'required|alpha_num|min:8|confirmed',
				'password_confirmation' => 'required|alpha_num|min:8',
				'business_name' => 'required',
				'business_address' => 'required',
				'business_identity_document' => "required|min:8|unique:customers,identity_document,null,id,deleted_at,NULL",
				'business_cel_whatsapp' => 'required|min:6',
			];
		}
	}
}
