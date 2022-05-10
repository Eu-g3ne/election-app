<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoterResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public static $wrap = '';
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'surname' => $this->surname,
      'name' => $this->name,
      'patronymic' => $this->patronymic,
      'birthday' => $this->birthday,
      'birthplace' => $this->birthplace,
      'inn' => $this->inn,
      'passport' => $this->passport,
      'registration' => $this->whenLoaded('registration', function () {
        return new RegistrationResource($this->registration);
      }),
    ];
  }
}
