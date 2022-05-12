<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElectionResource extends JsonResource
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
      'post' => $this->post,
      'status' => $this->status,
      'started_at' => $this->started_at,
      'finished_at' => $this->finished_at,
      'candidates'=> $this->whenLoaded('candidates', function() {
        return $this->candidates->pluck('id');
      }),
      'candidates_count' => $this->candidates()->count(),

    ];
  }
}
