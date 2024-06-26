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
        Owner::factory(5)
            ->has(Address::factory()->count(1))
            ->has(Car::factory()->count(1))
            ->has(
                WorkOrder::factory()->count(1)
                    ->has(User::factory()->role('mechanic')->count(1))
                    ->has(User::factory()->role('operator')->count(1))
                    ->has(Task::factory()->count(5))
                    ->hasAttached(
                        Part::factory()->count(5)->create(),
                        ['quantity' => $this->generateRandomQuantity()]
                    )
            )
            ->create();
    }

    private function generateRandomQuantity(): int
    {
        return array_rand([1, 2, 3, 4, 5]);
    }
}
