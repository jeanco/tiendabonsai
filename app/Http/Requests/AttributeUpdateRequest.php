<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeUpdateRequest extends FormRequest {
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
			// category_attribute_id
            // 'name' => 'required|unique:subcategories,name,'.$this->input('subcategory_id').',id,category_id,' . $this->input('category_id'),
			'name' => "required|unique:attributes,name," . $this->input('id') . ",id,category_attribute_id," . $this->input('category_attribute_id') . ",deleted_at,NULL",
		];
	}
}
