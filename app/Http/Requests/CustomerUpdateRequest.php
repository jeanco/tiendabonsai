<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    if ($this->get('customer_type') == 1) {
      return [
        'identity_document' => 'required|unique:customers,identity_document,'.$this->get('customer_id'),
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'email|required',
        'cel_whatsapp' => 'required',
        'country_id' => 'required',
        'city_id' => 'required',
      ];

    } else {
      return [
        'identity_document' => 'required|unique:customers,identity_document,'.$this->get('customer_id'),
        'legal_name' => 'required',
        'email' => 'email|required',
        'cel_whatsapp' => 'required',
        'country_id' => 'required',
        'city_id' => 'required',
      ];
    }
  }
}
