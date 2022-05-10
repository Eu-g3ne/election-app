<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollingStation\StoreRequest;
use App\Http\Requests\PollingStation\UpdateRequest;
use App\Http\Resources\PollingStationCollection;
use App\Http\Resources\PollingStationResource;
use App\Http\Resources\VoterCollection;
use App\Models\PollingStation;
use Illuminate\Http\Request;

class PollingStationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pollingStations = PollingStation::all()->paginate(5);
    return new PollingStationCollection($pollingStations);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRequest $request)
  {
    $pollingStation = PollingStation::create($request->validated());
    return new PollingStationResource($pollingStation);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(PollingStation $pollingStation)
  {
    return new PollingStationResource($pollingStation);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRequest $request, PollingStation $pollingStation)
  {
    $pollingStation->update($request->validated());
    return new PollingStationResource($pollingStation);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(PollingStation $pollingStation)
  {
    $pollingStation->registrations()->delete();
    $pollingStation->delete();
  }

  public function voters(PollingStation $pollingStation)
  {
    $voters = $pollingStation->registrations->load('voter')->pluck('voter');
    return new VoterCollection($voters);
  }
}
