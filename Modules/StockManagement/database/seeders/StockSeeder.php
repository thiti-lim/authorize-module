<?php

namespace Modules\StockManagement\database\seeders;

use Illuminate\Database\Seeder;
use Modules\StockManagement\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::factory()->count(10)->create();
    }
}
