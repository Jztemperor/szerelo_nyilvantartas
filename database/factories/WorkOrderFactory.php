<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkOrder>
 */
class WorkOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $task = Task::factory()->create();
        $owner = Owner::factory()->create();

        return [
            'status' => fake()->boolean(),
            'owner_id' => $owner->id,
            'task_id' => $task->id,
        ];
    }
}
