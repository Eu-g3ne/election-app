<?php

use App\Models\Election;
use App\Models\Voter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElectionVoterPivotTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('election_voter', function (Blueprint $table) {
      $table->id();
      $table->integer('candidate_id');
      $table->foreignIdFor(Election::class);
      $table->foreignIdFor(Voter::class);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('election_voter');
  }
}
