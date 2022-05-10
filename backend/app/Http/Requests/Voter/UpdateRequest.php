<?php

namespace App\Http\Requests\Voter;

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
      'surname' => 'sometimes|string|max:255',
      'name' => 'sometimes|string|max:255',
      'patronymic' => 'sometimes|string|max:255',
      'birthday' => 'sometimes|date',
      'birthplace' => 'sometimes|string|max:255',
      'inn' => 'sometimes|string|max:255',
      'passport' => 'sometimes|string|max:255',
      'registration.country' => 'sometimes|string|max:255',
      'registration.city' => 'sometimes|string|max:255',
      'registration.address' => 'sometimes|string|max:255',
      'registration.polling_station_id' => 'required|integer|exists:polling_stations,id',
      'registration.constituency_id' => 'required|integer|exists:constituencies,id'
    ];
  }
}
