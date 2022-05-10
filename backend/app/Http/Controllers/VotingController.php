<?php

namespace App\Http\Controllers;

use App\Http\Resources\CandidateCollection;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Voter;
use App\Services\VotingService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class VotingController extends Controller
{

  public function __construct(Candidate $candidate, Election $election, Voter $voter, VotingService $votingService)
  {
    $this->candidate = $candidate;
    $this->election = $election;
    $this->voter = $voter;
    $this->votingService = $votingService;
  }

  public function makeVote(Voter $voter, Election $election, Candidate $candidate)
  {
    try {
      if ($voter->elections->contains($election->id) === true) {
        return response()->json([
          'success' => false,
          'message' => 'Voter has already voted on this election'
        ]);
      } else {
        $voter->elections()->attach($election->id, ['candidate_id' => $candidate->id]);
        return response()->json([
          'success' => true,
        ]);
      }
    } catch (Throwable $e) {
      report($e);
    }
  }

  public function getByElection(Voter $voter = null, Election $election)
  {
    try {
      $this->candidate = Candidate::viaElection($election)->get();
      $this->candidate = $this->votingService->addTotalVotes($this->candidate, $election);
      $check = $this->votingService->addCanVote($this->candidate, $election, $voter);
      if ($check != null) {
        return (new CandidateCollection($this->candidate->paginate(10)))->additional(['can_vote' => $check]);
      } else {
        return new CandidateCollection($this->candidate->paginate(10));
      }
    } catch (Throwable $e) {
      report($e);
      return response()->json([
        'success' => false,
        'message' => 'Something went wrong'
      ]);
    }
  }

  public function deleteVote(Voter $voter, Election $election, Candidate $candidate = null)
  {
    $voter->elections()->detach($election->id);
    return response()->json([
      'success' => true,
      'message' => 'Vote deleted successfully'
    ]);
  }
}
