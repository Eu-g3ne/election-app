<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Constituency;
use App\Models\Contract;
use App\Models\Election;
use App\Models\Party;
use App\Models\PollingStation;
use App\Models\Registration;
use App\Models\Voter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $pollingStation = PollingStation::factory()->create();
    $constituency = Constituency::factory()->create();
    $party = Party::factory()->create();
    $election = Election::factory()->create();
    Contract::factory(10)->for($party)->make()->each(function ($contract) use ($election) {
      $candidate = Candidate::factory()->create();
      $candidate->contract()->save($contract);
      $candidate->elections()->attach($election->id);
    });

    Registration::factory(10)->for($pollingStation)->for($constituency)->make()->each(function ($registration) use ($election) {
      $voter = Voter::factory()->create();
      $voter->registration()->save($registration);
      $voter->elections()->attach($election->id, ['candidate_id' => Candidate::all()->random()->id]);
    });
  }
}
