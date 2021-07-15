<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(rand(25, 100))
            ->has(ProductStock::factory()->count(rand(1, 9)))
            ->create();
    }
}
