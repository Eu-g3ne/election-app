<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CandidateCollection extends ResourceCollection
{
  /**
   * Transform the resource collection into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public static $wrap = 'candidates';
  public function toArray($request)
  {
    return [
      'candidates' => $this->collection,
      'candidatesCount' => $this->count(),
    ];
  }
}
