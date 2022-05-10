<?php

use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('candidate_election', function (Blueprint $table) {
      $table->foreignIdFor(Candidate::class);
      $table->foreignIdFor(Election::class);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('candidate_election');
  }
};
