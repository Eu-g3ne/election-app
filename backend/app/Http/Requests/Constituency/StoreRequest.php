<?php

namespace App\Http\Requests\Constituency;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    return [
      'region' => 'required|string|max:255',
      'email' => 'required|email:rfc',
      'phone' => 'required|string|max:255',
      'address' => 'required|string|max:255',
    ];
  }
}
