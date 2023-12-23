<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'value' => rand(0, 1) === 0 ?
                rand(0, 100) :
                fake()->words(rand(1, 3), 1),
            'product_id' => Product::query()->first(),
        ];
    }
}
