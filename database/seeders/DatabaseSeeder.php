<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductProperty;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(100)->create();
        ProductProperty::factory(500)->create();
        User::factory()->create();
    }
}
