<?php

namespace App\Http\Requests\Constituency;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
      'region' => 'sometimes|string|max:255',
      'email' => 'sometimes|email:rfc',
      'phone' => 'sometimes|string|max:255',
      'address' => 'sometimes|string|max:255',
    ];
  }
}
