<?php

namespace Database\Factories;

use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PartWorkorder>
 */
class PartWorkorderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $part = Part::factory()->create();

        return [
            "part_id" => $part->id,
            "workorder_id" => fake()->numberBetween(1, 10)
        ];
    }
}
