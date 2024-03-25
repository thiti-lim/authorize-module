<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'RM User']);
        Role::create(['name' => 'RM Manager']);
        Role::create(['name' => 'Planning']);
        Role::create(['name' => 'Production']);
        User::factory()->count(10)->create();
    }
}
