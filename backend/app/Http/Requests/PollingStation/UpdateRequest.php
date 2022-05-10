<?php

namespace App\Http\Requests\PollingStation;

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
      'address' => 'sometimes|string|max:255',
      'city' => 'sometimes|string|max:255',
      'phone' => 'sometimes|string|max:255'
    ];
  }
}
