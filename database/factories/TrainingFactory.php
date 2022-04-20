<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['physical', 'educational']),
            'title' => $this->faker->sentence,
            'for_date' => $this->faker->dateTimeBetween('+1 day', '+2 month'),
            'shift' => $this->faker->randomElement(['morning', 'evening']),
            'completed' => $this->faker->boolean,
        ];
    }
}
