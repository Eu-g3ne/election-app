<?php

namespace App\Http\Requests\Candidate;

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
      'surname' => 'sometimes|string|max:32',
      'name' => 'sometimes|string|max:32',
      'patronymic' => 'sometimes|string|max:32',
      'birthday' => 'sometimes|date',
      'education' => 'sometimes|string|max:255',
      'passport' => 'sometimes|string|max:32',
      'activity' => 'sometimes|string',
      'contract.entry_date' => 'sometimes|date',
      'contract.mandate_number' => 'sometimes|integer',
      'contract.party_id' => 'required|integer|exists:parties,id'
    ];
  }
}
