<?php

namespace App\Http\Requests\Party;

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
      'name' => 'sometimes|string|max:255',
      'created_at' => 'sometimes|date',
      'leader' => 'sometimes|string|max:255',
      'contract.party_id' => 'sometimes|integer',
    ];
  }
}
