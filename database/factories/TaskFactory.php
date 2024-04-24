<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Oil Change',
                'Brake Inspection',
                'Tire Rotation',
                'Battery Check',
                'Engine Tune-Up',
                'Transmission Service',
                'Brake Pad Replacement',
                'Wheel Alignment',
                'Air Filter Replacement',
                'Spark Plug Replacement',
                'Coolant Flush',
                'Windshield Wiper Replacement',
                'Fuel Filter Replacement',
                'Timing Belt Replacement',
                'Exhaust System Inspection'
            ]),
            'duration' => fake()->numberBetween(1, 40)
        ];
    }
}
