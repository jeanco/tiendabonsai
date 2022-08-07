<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest {
	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'name' => "required|unique:categories,name," . $this->input('category_id') . ",id,deleted_at,NULL",
		];
	}
}
