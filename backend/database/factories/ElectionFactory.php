<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Election>
 */
class ElectionFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'post' => $this->faker->randomElement(array('President', 'Mayor', 'Governer')),
      'status' => $this->faker->randomElement(array('Ongoing', 'Finished')),
      'started_at' => $this->faker->date,
      'finished_at' => $this->faker->date,
    ];
  }
}
