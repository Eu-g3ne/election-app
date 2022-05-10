<?php

use App\Models\Candidate;
use App\Models\Voter;
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
    Schema::create('elections', function (Blueprint $table) {
      $table->id();
      $table->string('post');
      $table->string('status');
      $table->date('started_at');
      $table->date('finished_at');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('elections');
  }
};
