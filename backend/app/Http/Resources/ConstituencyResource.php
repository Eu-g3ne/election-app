<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConstituencyResource extends JsonResource
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
      'region' => $this->region,
      'email' => $this->email,
      'phone' => $this->phone,
      'address' => $this->address,
      'total_voters' => $this->registrations->count(),
    ];
  }
}
