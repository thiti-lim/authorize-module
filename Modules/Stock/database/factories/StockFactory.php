<?php

namespace Modules\Stock\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Stock\Models\Stock::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

