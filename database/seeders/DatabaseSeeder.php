<?php

namespace Database\Seeders;

use App\Models\Permission;
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
        $role_rm_user = Role::firstOrCreate(['name' => 'RM User']);
        $role_rm_manager = Role::firstOrCreate(['name' => 'RM Manager']);
        $role_planning = Role::firstOrCreate(['name' => 'Planning']);
        User::factory()->count(10)->create();
        $perm_1 = Permission::create([
            'code' => 'stock_can_edit',
            'name' => 'สามารถแก้คลัง'
        ]);
        $perm_2 = Permission::create([
            'code' => 'stock_can_move',
            'name' => 'สามารถย่าย'
        ]);
        $perm_3 = Permission::create([
            'code' => 'stock_can_delete',
            'name' => 'สามารถลบ'
        ]);
        $perm_4 = Permission::create([
            'code' => 'planning_can_add',
            'name' => 'สามารถเพิ่มแผน'
        ]);
        $role_rm_manager->permissions()->attach([$perm_1->id, $perm_2->id]);
        $role_planning->permissions()->attach([$perm_2->id, $perm_4->id]);
        $role_rm_user->permissions()->attach([$perm_3->id]);



    }
}
