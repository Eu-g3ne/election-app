<?php

use App\Models\Constituency;
use App\Models\PollingStation;
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
    Schema::create('registrations', function (Blueprint $table) {
      $table->id();
      $table->string('country');
      $table->string('city');
      $table->string('address');
      $table->foreignIdFor(Voter::class);
      $table->foreignIdFor(Constituency::class);
      $table->foreignIdFor(PollingStation::class);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('registrations');
  }
};
