<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Module;
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
        $role_rm_manager = Role::firstOrCreate(['name' => 'RM Manager']);
        $role_planning = Role::firstOrCreate(['name' => 'Planning']);
        $role_en_repair = Role::firstOrCreate(['name' => 'EN Repair']);
        $thiti = User::create(['name' => 'Thiti', 'username' => 'thiti', 'role_id' => $role_rm_manager->id, 'password' => 'password']);

        $create = Permission::create([
            'code' => 'create',
            'name' => 'สร้าง'
        ]);
        $read = Permission::create([
            'code' => 'read',
            'name' => 'อ่าน'
        ]);
        $update = Permission::create([
            'code' => 'update',
            'name' => 'แก้ไข'
        ]);
        $delete = Permission::create([
            'code' => 'delete',
            'name' => 'ลบ'
        ]);
        $module_planning = Module::firstOrCreate(['id' => 'PL', 'name' => 'Planning']);
        $module_engineering = Module::firstOrCreate(['id' => 'EN', 'name' => 'Engineering']);

        $menu_move_stock = Menu::firstOrCreate(['name' => 'move_stock', 'module_id' => $module_planning->id]);
        $menu_reserve_stock = Menu::firstOrCreate(['name' => 'reserve_stock', 'module_id' => $module_planning->id]);
        $menu_out_stock = Menu::firstOrCreate(['name' => 'out_stock', 'module_id' => $module_planning->id]);
        $menu_report_job = Menu::firstOrCreate(['name' => 'report_job', 'module_id' => $module_engineering->id]);
        $menu_jobs = Menu::firstOrCreate(['name' => 'jobs', 'module_id' => $module_engineering->id]);

        $role_planning->modules()->attach([$module_planning->id]);
        $role_rm_manager->modules()->attach([$module_planning->id, $module_engineering->id]);
        $role_en_repair->modules()->attach([$module_engineering->id]);

        $role_rm_manager->addPermissions($menu_reserve_stock, $create);
        $role_rm_manager->addPermissions($menu_reserve_stock, $read);
        $role_rm_manager->addPermissions($menu_reserve_stock, $update);
        $role_rm_manager->addPermissions($menu_out_stock, $read);
        $role_rm_manager->addPermissions($menu_report_job, $read);

    }
}
