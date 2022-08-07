<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileUpdateTemplate4Request extends FormRequest {
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

		if ($request->password) {
			return [
				'identity_document' => "required|min:8|unique:customers,identity_document," . $this->input('customer_id') . ",id,deleted_at,NULL",
				'first_name' => 'required',
				'last_name' => 'required',
				'email' => 'required|email',
				/*'address' => 'required',*/
				'username' => "required|min:8|unique:users,username," . $this->input('user_id') . ",id,deleted_at,NULL",
				'birthday' => 'required',
				'password' => 'required|alpha_num|min:8|confirmed',
				'password_confirmation' => 'required|alpha_num|min:8',
				'country_id' => 'required',
				'city_id' => 'required',
				'province_id' => 'required',
				'district_id' => 'required',
				'address_envio' => 'required',
				'identity_document_envio' => 'required',
				'first_name_envio' => 'required',
				'last_name_envio' => 'required',
				'cel_envio' => 'required',

			];
		}

		return [
			'identity_document' => "required|min:8|unique:customers,identity_document," . $this->input('customer_id') . ",id,deleted_at,NULL",
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			/*'address' => 'required',*/
			'username' => "required|min:8|unique:users,username," . $this->input('user_id') . ",id,deleted_at,NULL",
			'birthday' => 'required',
			'country_id' => 'required',
			'city_id' => 'required',
			'province_id' => 'required',
			'district_id' => 'required',
			'address_envio' => 'required',
			//'identity_document_envio' => 'required',
			//'first_name_envio' => 'required',
			//'last_name_envio' => 'required',
			//'cel_envio' => 'required',
		];
	}
}
