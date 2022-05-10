<?php

namespace App\Observers;

use App\Models\Contract;

class ContractObserver
{
  /**
   * Handle the Contract "created" event.
   *
   * @param  \App\Models\Contract  $contract
   * @return void
   */
  public $afterCommit = true;
  public function created(Contract $contract)
  {
    //
    $contract->party->total_members = Contract::where('party_id', $contract->party_id)->count();
    $contract->party->save();
  }

  /**
   * Handle the Contract "updated" event.
   *
   * @param  \App\Models\Contract  $contract
   * @return void
   */
  public function updated(Contract $contract)
  {
    //
  }

  /**
   * Handle the Contract "deleted" event.
   *
   * @param  \App\Models\Contract  $contract
   * @return void
   */
  public function deleting(Contract $contract)
  {
    $contract->party->total_members = $contract->party->contracts()->count() - 1;
    $contract->party->save();
  }

  /**
   * Handle the Contract "restored" event.
   *
   * @param  \App\Models\Contract  $contract
   * @return void
   */
  public function restored(Contract $contract)
  {
    //
  }

  /**
   * Handle the Contract "force deleted" event.
   *
   * @param  \App\Models\Contract  $contract
   * @return void
   */
  public function forceDeleted(Contract $contract)
  {
    //
  }
}
