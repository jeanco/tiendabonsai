<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationSaveTemplate8 extends FormRequest {
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
			'identity_document' => 'required',
			'document_type' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'city_id' => 'required',
			'province_id' => 'required',
			'district_id' => 'required',
			'email' => 'required|confirmed',
			'email_confirmation' => 'required',
			'cel_whatsapp' => 'required',
		];
	}
}
