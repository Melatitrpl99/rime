<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Product;
use App\Models\ProductStock;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use OverflowException;

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
            ->count(rand(5, 25))
            ->hasImages(5)
            ->create();

        try {
            ProductStock::factory()
                ->count(Product::count() * rand(7, 20))
                ->create();
        } catch (QueryException $e) {
            //
        }
    }
}
