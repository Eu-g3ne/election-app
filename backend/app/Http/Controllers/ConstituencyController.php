<?php

namespace App\Http\Controllers;

use App\Http\Requests\Constituency\StoreRequest;
use App\Http\Requests\Constituency\UpdateRequest;
use App\Http\Resources\ConstituencyCollection;
use App\Http\Resources\ConstituencyResource;
use App\Http\Resources\PollingStationCollection;
use App\Http\Resources\VoterCollection;
use App\Models\Constituency;
use App\Models\Registration;
use App\Models\Voter;
use Illuminate\Http\Request;
use Throwable;

class ConstituencyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $constituencies = Constituency::all()->paginate(5);
    return new ConstituencyCollection($constituencies);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRequest $request)
  {
    try {
      $constituency = Constituency::create($request->validated());
      return new ConstituencyResource($constituency);
    } catch (Throwable $e) {
      report($e);
      return response()->json([
        'success' => false,
        'message' => 'Something went wrong'
      ]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Constituency $constituency)
  {
    return new ConstituencyResource($constituency);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRequest $request, Constituency $constituency)
  {
    $constituency->update($request->validated());
    return new ConstituencyResource($constituency);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Constituency $constituency)
  {
    $constituency->registrations()->delete();
    $constituency->delete();
  }
  public function voters(Constituency $constituency)
  {
    $voters = $constituency->registrations->load('voter')->pluck('voter');
    return new VoterCollection($voters);
  }

  public function pollingStations(Constituency $constituency)
  {
    $pollingStations = $constituency->registrations->load('pollingStation')->pluck('pollingStation')->unique();
    return new PollingStationCollection($pollingStations);
  }
}
