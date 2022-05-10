<?php

namespace App\Http\Requests\PollingStation;

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
      'address' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'phone' => 'required|string|max:255'
    ];
  }
}
