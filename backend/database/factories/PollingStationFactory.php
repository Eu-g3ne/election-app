<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollingStation>
 */
class PollingStationFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'address' => $this->faker->address,
      'city' => $this->faker->city,
      'phone' => $this->faker->phoneNumber,
    ];
  }
}
