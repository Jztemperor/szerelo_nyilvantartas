<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role_name' => 'operator',
            'created_at' => Carbon::now()->format('y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('y-m-d H:i:s')
        ]);

        DB::table('roles')->insert([
            'role_name' => 'mechanic',
            'created_at' => Carbon::now()->format('y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('y-m-d H:i:s')
        ]);
    }
}
