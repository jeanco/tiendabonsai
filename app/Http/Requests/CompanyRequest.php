<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest {
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
			'name_company' => 'required',
			'cel' => 'required',
			// 'membership_date_without_format' => 'required',
			'business_name' => 'required',
			'ruc' => 'required',
			'email' => 'email|required',
		];
	}
}
