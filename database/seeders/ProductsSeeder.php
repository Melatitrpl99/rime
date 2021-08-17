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
            ->count(rand(5, 20))
            ->has(ProductStock::factory()->count(rand(10, 50)))
            ->create();
    }
}
