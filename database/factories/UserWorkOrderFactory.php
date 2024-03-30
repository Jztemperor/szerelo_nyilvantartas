<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWorkOrder>
 */
class UserWorkOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->role('mechanic')->create();
        $workorder = WorkOrder::factory()->create();

        return [
            'user_id' => $user->id,
            'workorder_id' => $workorder->id
        ];
    }
}
