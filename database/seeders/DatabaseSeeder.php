<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Owner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call seeders
        $this->call([
            RoleSeeder::class,
            RelationSeeder::class,
        ]);

        // \App\Models\User::factory(5)->role('operator')->create();
        // \App\Models\User::factory(5)->role('mechanic')->create();
        User::factory(1)->role('admin')->create();
    }
}
