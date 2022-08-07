<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimSaveRequest extends FormRequest {
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
			'full_name' => 'required',
			'phone' => 'required|min:6',
			//'other_phone' => 'required|min:6',
			'address' => 'required',
			'region' => 'required',
			'province' => 'required',
			'district' => 'required',
			'document_type' => 'required',
			'identity_document' => 'required|min:8',
			'email' => 'required|email',
			'amount' => 'required',
			'payment_voucher' => 'required',
			'details' => 'required',
		];
	}
}
