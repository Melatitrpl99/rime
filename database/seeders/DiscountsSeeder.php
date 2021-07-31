<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\DiscountDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DiscountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::factory()
            ->count(rand(1, 30))
            ->create()
            ->each(function ($discount) {
                $products = Product::inRandomOrder()
                    ->limit(rand(1, Product::count()))
                    ->get();

                foreach($products as $product) {
                    $discount->products()->attach($product,
                        DiscountDetail::factory()
                            ->make()
                            ->toArray());
                }
            });
    }
}
