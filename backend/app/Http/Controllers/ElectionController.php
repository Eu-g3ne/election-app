<?php

namespace App\Http\Controllers;

use App\Http\Requests\Election\StoreRequest;
use App\Http\Requests\Election\UpdateRequest;
use App\Http\Resources\CandidateCollection;
use App\Http\Resources\ElectionCollection;
use App\Http\Resources\ElectionResource;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Voter;
use Illuminate\Http\Request;



class ElectionController extends Controller
{
  public function __construct(Election $election)
  {
    $this->election = $election;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $elections = Election::without('candidates')->paginate(5);
    return new ElectionCollection($elections);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRequest $request)
  {
    $this->election = Election::create($request->validated());
    return new ElectionResource($this->election);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Election $election)
  {
    return new ElectionResource($election->load('candidates'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRequest $request, Election $election)
  {
    $election->update($request->validated());
    $election->candidates()->sync($request->validated()['candidates']);
    return new ElectionResource($election);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Election $election)
  {
    $election->candidates()->detach();
    $election->voters()->detach();
    $election->delete();
    return response()->json([
      'success' => true,
      'message' => 'Election deleted successfully'
    ]);
  }

  public function candidates(Election $election, Candidate $candidate)
  {
    $candidates = $election->candidates()->get();
    return new CandidateCollection($candidates);
  }

  public function availableElections(Voter $voter)
  {
    $elections = Election::whereDoesntHave('voters', function ($q) use ($voter) {
      $q->where('voter_id', '=', $voter->id);
    })->get()->paginate(5);
    return new ElectionCollection($elections);
  }
}
