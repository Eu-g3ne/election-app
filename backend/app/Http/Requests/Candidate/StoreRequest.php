<?php

namespace App\Http\Requests\Candidate;

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
      'surname' => 'required|string|max:32',
      'name' => 'required|string|max:32',
      'patronymic' => 'required|string|max:32',
      'birthday' => 'required|date',
      'education' => 'required|string|max:255',
      'passport' => 'required|string|max:32',
      'activity' => 'required|string',
      'contract.entry_date' => 'sometimes|date',
      'contract.mandate_number' => 'sometimes|integer',
      'contract.party_id' => 'sometimes|integer|exists:parties,id'
    ];
  }
}
