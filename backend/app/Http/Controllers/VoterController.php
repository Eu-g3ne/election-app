<?php

namespace App\Http\Controllers;

use App\Http\Requests\Voter\StoreRequest;
use App\Http\Requests\Voter\UpdateRequest;
use App\Http\Resources\VoterCollection;
use App\Http\Resources\VoterResource;
use App\Models\Registration;
use App\Models\Voter;
use Illuminate\Http\Request;
use Throwable;

class VoterController extends Controller
{
  public function __construct(Voter $voter)
  {
    $this->voter = $voter;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->voter = Voter::without('registration')->paginate(5);
    return new VoterCollection($this->voter);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRequest $request)
  {
    $voter = Voter::create($request->validated());
    $voter->registration()->create($request->validated()['registration']);
    return new VoterResource($voter);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Voter $voter)
  {
    return new VoterResource($voter->load('registration'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRequest $request, Voter $voter)
  {
    try {
      $voter->update($request->validated());
      $voter->registration->update($request->validated()['registration']);
      return new VoterResource($voter);
    } catch (Throwable $e) {
      report($e);
      return response()->json([
        'success' => false,
        'message' => 'Something went wrong'
      ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Voter $voter)
  {
    try {
      $voter->registration->delete();
      $voter->elections()->detach();
      $voter->delete();
      return response()->json([
        'success' => true,
        'message' => 'Voter deleted successfully'
      ]);
    } catch (Throwable $e) {
      report($e);
      return response()->json([
        'success' => false,
        'message' => 'Something went wrong'
      ]);
    }
  }
}
