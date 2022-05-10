<?php

namespace App\Http\Controllers;

use App\Http\Requests\Candidate\StoreRequest;
use App\Http\Requests\Candidate\UpdateRequest;
use App\Http\Resources\CandidateCollection;
use App\Http\Resources\CandidateResource;
use App\Models\Candidate;
use App\Models\Contract;
use App\Models\Election;
use App\Models\Party;
use App\Models\Voter;
use Illuminate\Http\Request;
use Throwable;

class CandidateController extends Controller
{
  public function __construct(Candidate $candidate, Contract $contract)
  {
    $this->candidate = $candidate;
    $this->contract = $contract;
  }

  public function index(Party $party = null, Voter $voter = null, Election $election = null)
  {
    if (isset($party)) {
      $this->candidate = Candidate::viaParty($party)->get()->paginate(5);
    } else {
      $this->candidate = Candidate::without('contract')->paginate(5);
    }

    return new CandidateCollection($this->candidate);
  }

  public function store(StoreRequest $request, Party $party = null)
  {
    try {
      $this->candidate = Candidate::create($request->validated());
      $this->candidate->contract()->create($request->validated()['contract']);
      if (isset($party)) {
        $this->contract = new Contract($request->validated()['contract']);
        $this->contract->party()->associate($party);
        $this->contract->candidate()->associate($this->candidate);
        $this->contract->save();
        $this->candidate = $this->contract->candidate;
      }
    } catch (Throwable $e) {
      report($e);
    }
    return new CandidateResource($this->candidate);
  }

  public function show(Party $party = null, Candidate $candidate)
  {
    return new CandidateResource($candidate->load('contract'));
  }

  public function update(UpdateRequest $request, Party $party = null, Candidate $candidate)
  {
    try {
      $candidate->update($request->validated());
      if (isset($party)) {
        $contract = $candidate->contract();
        $contract->update($request->validated()['contract']);
      }
    } catch (Throwable $e) {
      report($e);
    }
    return new CandidateResource($candidate);
  }

  public function destroy(Party $party = null, Candidate $candidate)
  {
    $candidate->delete();
  }

  public function makeVote(Voter $voter, Election $election, Candidate $candidate)
  {
    try {
      $voter->elections()->attach($election->id, ['candidate_id' => $candidate->id]);
    } catch (Throwable $e) {
      report($e);
    }

    return response()->json([
      'success' => true,
    ]);
  }

  public function getByElection(Voter $voter = null, Election $election)
  {
    $this->candidate = Candidate::viaElection($election)->get();
    return new CandidateCollection($this->candidate);
  }
}
