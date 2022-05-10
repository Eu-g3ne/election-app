<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
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
      'education' => $this->faker->jobTitle,
      'passport' => $this->faker->unique()->numerify('PN#######'),
      'activity' => $this->faker->paragraph(3, true),
    ];
  }
}
