<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidateTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_example()
  {
    $response = $this->get('/');

    $response->assertStatus(200);
  }
  use DatabaseTransactions;
  public function test_making_an_api_request()
  {
    $response = $this->postJson('/api/parties/1/candidaties', [
      'candidate' => [
        'surname' => 'test',
        'name' => 'test',
        'patronymic' => 'test',
        'birthday' => '1970-04-02',
        'education' => 'nemae',
        'passport' => 'KN12121',
        'activity' => 'riding the bike'
      ],
      'contract' => [
        'entry_date' => '1970-04-02',
        'mandate_number' => '111111'
      ]
    ]);
    $response->assertStatus(200);
  }
}
