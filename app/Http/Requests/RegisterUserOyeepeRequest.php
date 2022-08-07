<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserOyeepeRequest extends FormRequest {
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
			'first_name' => 'required',
			'last_name' => 'required',
			'cel' => 'required|unique:users,cel',
			'password' => 'required|alpha_num|min:8|confirmed',
			'password_confirmation' => 'required|alpha_num|min:8',
		];
	}
}
