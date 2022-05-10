<?php

use App\Models\Party;
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
    Schema::create('candidates', function (Blueprint $table) {
      $table->id();
      $table->string('surname');
      $table->string('name');
      $table->string('patronymic');
      $table->date('birthday');
      $table->string('education');
      $table->string('passport')->unique();
      $table->longText('activity');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('candidates');
  }
};
