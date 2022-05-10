<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
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
      'education' => $this->education,
      'passport' => $this->passport,
      'activity' => $this->activity,
      'total_votes' => $this->whenNotNull($this->total_votes),
      'contract' => $this->whenLoaded('contract', function () {
        return new ContractResource($this->contract);
      }),
    ];
  }
}
