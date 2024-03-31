<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Car;
use App\Models\Owner;
use App\Models\Part;
use App\Models\Task;
use App\Models\User;
use App\Models\WorkOrder;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::factory(10)
            ->has(Address::factory()->count(1))
            ->has(Car::factory()->count(1))
            ->has(
                WorkOrder::factory()->count(1)
                    ->has(User::factory()->role('operator')->count(5))
                    ->has(Task::factory()->count(5))
                    ->has(Part::factory()->count(5))
            )
            ->create();
    }
}
