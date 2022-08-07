<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest {
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
			'first_name' => 'required|min:2|alpha_spaces',
			'last_name' => 'required|min:2|alpha_spaces',
			'email' => 'email',
			'cel' => 'required|unique:users,cel',
			'cel_holder' => 'required',
			'password' => 'required|alpha_num|min:8|confirmed',
			'password_confirmation' => 'required|alpha_num|min:8',

		];
	}
}
