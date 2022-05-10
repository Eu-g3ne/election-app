<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Constituency>
 */
class ConstituencyFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'region' => $this->faker->state,
      'email' => $this->faker->email,
      'phone' => $this->faker->phoneNumber,
      'address' => $this->faker->address,
    ];
  }
}
