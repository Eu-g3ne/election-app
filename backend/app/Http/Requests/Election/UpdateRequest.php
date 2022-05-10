<?php

namespace App\Http\Requests\Election;

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
      'post' => 'sometimes|string|max:255',
      'status' => 'sometimes|string|max:255',
      'started_at' => 'sometimes|date',
      'finished_at' => 'sometimes|date'
    ];
  }
}
