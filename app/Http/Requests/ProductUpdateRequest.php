<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest {
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
			//'name' => 'required|unique:products,name, '.$this->get('id'),
			'name' => "required|unique:products,name," . $this->get('id') . ",id,deleted_at,NULL",
			// 'description' => 'required',
			'category_id' => 'required',
			'subcategory_id' => 'required',
			'price' => 'required',
			'minimum_quantity' => 'required|numeric|min:0|not_in:0',
			// 'stock' => 'required',
		];
	}
}
