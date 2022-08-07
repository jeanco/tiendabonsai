<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoyFriendsClubRequest extends FormRequest {
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
			'boyfriend_full_name' => 'required',
			'boyfriend_identity_document' => 'required',
			'boyfriend_cellphone' => 'required',
			'boyfriend_email' => 'required|email',
			'boyfriend_birthday' => 'required',
			'boyfriend_address' => 'required',
			'girlfriend_full_name' => 'required',
			'girlfriend_identity_document' => 'required',
			'girlfriend_cellphone' => 'required',
			'girlfriend_email' => 'required|email',
			'girlfriend_birthday' => 'required',
			'girlfriend_address' => 'required',
			'wedding_address' => 'required',
			'wedding_hour' => 'required',
			'wedding_date' => 'required',
		];
	}
}
