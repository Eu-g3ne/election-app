<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ConstituencyController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PollingStationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

  Route::get('candidates/all', [CandidateController::class, 'allCandidates']);

Route::apiResources([
  'candidates' => CandidateController::class,
  'constituencies' => ConstituencyController::class,
  'elections' => ElectionController::class,
  'parties' => PartyController::class,
  'polling_stations' => PollingStationController::class,
  'voters' => VoterController::class,
]);

Route::prefix('parties/{party}')->group(function () {
  Route::apiResource('/candidates', CandidateController::class);
});

Route::prefix('reports')->controller(ReportController::class)->group(function () {
  Route::get('elections',  'elections');
  Route::get('voters', 'voters');
  Route::get('candidates', 'candidates');
  Route::get('parties', 'parties');
  Route::get('constituencies', 'constituencies');
  Route::get('polling_stations', 'pollingStations');
});

Route::prefix('elections/{election}')->group(function () {
  Route::get('/candidates', [ElectionController::class, 'candidates']);
});



Route::prefix('voters/{voter}')->group(function () {
  Route::get('/elections', [ElectionController::class, 'availableElections']);
  Route::prefix('/elections/{election}')->group(function () {
    Route::get('/candidates', [VotingController::class, 'getByElection']);
    Route::post('/candidates/{candidate}', [VotingController::class, 'makeVote'])->middleware('can.vote');
    Route::delete('/candidates/{candidate}', [VotingController::class, 'deleteVote']);
  });
});
Route::prefix('constituencies/{constituency}')->group(function () {
  Route::get('/voters', [ConstituencyController::class, 'voters']);
  Route::get('/polling_stations', [ConstituencyController::class, 'pollingStations']);
});

Route::prefix('polling_stations/{polling_station}')->group(function () {
  Route::get('/voters', [PollingStationController::class, 'voters']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});
