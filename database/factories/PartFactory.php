<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Engine', 'Turbo', 'Paint', 'Window', 'Brakes', 'Bumper', 'Battery', 'Axel', 'Radiator', 'Alternator']),
            'quantity' => fake()->numberBetween(1, 200),
            'price' => fake()->numberBetween(10000, 5000000)
        ];
    }
}
