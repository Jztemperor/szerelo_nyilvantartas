<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => fake()->country(),
            'state' => fake()->text(5),
            'city' => fake()->city(),
            'zip_code' => fake()->numberBetween(8000, 10000),
            'street' => fake()->streetName(),
            'street_nr' => fake()->numberBetween(1, 200),
        ];
    }
}
