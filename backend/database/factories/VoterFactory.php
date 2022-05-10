<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voter>
 */
class VoterFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'surname' => $this->faker->lastName,
      'name' => $this->faker->firstName,
      'patronymic' => $this->faker->firstName,
      'birthday' => $this->faker->date,
      'birthplace' => $this->faker->city . ', ' . $this->faker->country,
      'inn' => $this->faker->unique->numerify('IN#######'),
      'passport' => $this->faker->unique->numerify('PN#######'),
    ];
  }
}
