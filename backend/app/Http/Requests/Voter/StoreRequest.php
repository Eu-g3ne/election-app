<?php

namespace App\Http\Requests\Voter;

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
      'surname' => 'required|string|max:255',
      'name' => 'required|string|max:255',
      'patronymic' => 'required|string|max:255',
      'birthday' => 'required|date',
      'birthplace' => 'required|string|max:255',
      'inn' => 'required|string|max:255',
      'passport' => 'required|string|max:255',
      'registration.country' => 'required|string|max:255',
      'registration.city' => 'required|string|max:255',
      'registration.address' => 'required|string|max:255',
      'registration.polling_station_id' => 'required|integer|exists:polling_stations,id',
      'registration.constituency_id' => 'required|integer|exists:constituencies,id'
    ];
  }
  public function messages()
  {
    return [
      'surname.required' => "Поле прізвище обов'язкове",
      'name.required' => "Поле ім'я обов'язкове",
      'patronymic.required' => "Поле по-батькові обов'язкове",
      'birthday.required' => "Поле дата народження обов'язкове",
      'birthplace.required' => "Поле місце народження обов'язкове",
      'inn.required' => "Поле ІНН обов'язкове",
      'passport.required' => "Поле паспорт обов'язкове",
      'registration.country.required' => "Поле країна обов'язкове",
      'registration.city.required' => "Поле місто обов'язкове",
      'registration.address.required' => "Поле адреса обов'язкове",
      'registration.polling_station_id.required' => "Поле виборча дільниця обов'язкове",
      'registration.constituency_id.required' => "Поле виборчий округ обов'язкове",
    ];
  }
}
