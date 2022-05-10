<?php

namespace App\Observers;

use App\Models\Registration;

class RegistrationObserver
{
  /**
   * Handle the Registration "created" event.
   *
   * @param  \App\Models\Registration  $registration
   * @return void
   */
  public $afterCommit = true;
  public function created(Registration $registration)
  {
    //
    $registration->constituency->total_voters = Registration::where('constituency_id', $registration->constituency_id)->count();
    $registration->pollingStation->total_voters = Registration::where('polling_station_id', $registration->polling_station_id)->count();
    $registration->pollingStation->save();
    $registration->constituency->save();
  }

  /**
   * Handle the Registration "updated" event.
   *
   * @param  \App\Models\Registration  $registration
   * @return void
   */
  public function updated(Registration $registration)
  {
    //
  }

  /**
   * Handle the Registration "deleted" event.
   *
   * @param  \App\Models\Registration  $registration
   * @return void
   */
  public function deleting(Registration $registration)
  {
    $registration->constituency->total_voters = Registration::with('constituencies')->count() - 1;
    $registration->pollingStation->total_voters = Registration::with('polling_stations')->count() - 1;
    $registration->pollingStation->save();
    $registration->constituency->save();
  }

  /**
   * Handle the Registration "restored" event.
   *
   * @param  \App\Models\Registration  $registration
   * @return void
   */
  public function restored(Registration $registration)
  {
    //
  }

  /**
   * Handle the Registration "force deleted" event.
   *
   * @param  \App\Models\Registration  $registration
   * @return void
   */
  public function forceDeleted(Registration $registration)
  {
    //
  }
}
