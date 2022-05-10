<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'country' => $this->country,
      'city' => $this->city,
      'address' => $this->address,
      'constituency_id' => $this->constituency_id,
      'polling_station_id' => $this->polling_station_id
    ];
  }
}
