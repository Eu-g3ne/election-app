<?php

use App\Models\Candidate;
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
    Schema::create('contracts', function (Blueprint $table) {
      $table->id();
      $table->date('entry_date')->nullable();
      $table->integer('mandate_number')->nullable();
      $table->foreignIdFor(Candidate::class);
      $table->foreignIdFor(Party::class)->nullable()->constrained()->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('contracts');
  }
};
