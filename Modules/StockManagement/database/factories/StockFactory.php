<?php

namespace Modules\StockManagement\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\StockManagement\Models\Stock::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

