<?php

namespace Modules\Planning\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MoveStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Planning\Models\MoveStock::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

