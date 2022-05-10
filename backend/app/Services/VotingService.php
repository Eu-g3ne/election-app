<?php

namespace App\Services;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Voter;
use Illuminate\Database\Eloquent\Collection;

class VotingService
{
  public function addCanVote(Collection $collection, Election $election, Voter $voter)
  {
    $voted = $voter->elections->contains($election->id);
    $candidates = [];
    if ($voted) {
      foreach ($voter->elections as $election) {
        $candidates[] = $election->pivot->candidate_id;
      }
    }
    $this->check = null;
    if (empty($candidates)) {
      return $this->check;
    }
    $collection->map(function ($item) use ($candidates) {
      if (get_class($item) === Candidate::class && in_array($item->id, $candidates)) {
        $this->check = $item->id;
      }
    });
    return $this->check;
  }

  public function addTotalVotes(Collection $collection, Election $election)
  {
    $total_votes = $election->voters->countBy(function ($voter) {
      return $voter->pivot->candidate_id;
    })->all();
    $collection->map(function ($item) use ($total_votes) {
      if (!array_key_exists($item->id, $total_votes)) {
        $total_votes[$item->id] = 0;
      }
      return [
        $item->total_votes = $total_votes[$item->id]
      ];
    });
    return $collection;
  }
}
