<?php

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
    Schema::create('polling_stations', function (Blueprint $table) {
      $table->id();
      $table->string('address');
      $table->string('city');
      $table->string('phone');
      $table->unsignedInteger('total_voters')->default(0);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('polling_stations');
  }
};
