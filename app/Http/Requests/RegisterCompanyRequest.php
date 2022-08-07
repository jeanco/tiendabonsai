<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCompanyRequest extends FormRequest {
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
	public function rules() {
		return [
			'ruc' => 'required',
			'email' => 'email',
			'user_first_name' => 'required',
			'user_last_name' => 'required',
			'user_cel' => 'required|unique:users,cel',
			'user_password' => 'required|alpha_num|min:8|confirmed',
			'user_password_confirmation' => 'required|alpha_num|min:8',
			'name_company' => 'required',
			'business_name' => 'required',
		];
	}
}
