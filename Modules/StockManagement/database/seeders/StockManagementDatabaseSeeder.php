<?php

namespace Modules\StockManagement\Database\Seeders;

use Illuminate\Database\Seeder;

class StockManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            StockSeeder::class,
        ]);
    }
}
