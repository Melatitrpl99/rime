<?php

namespace Database\Seeders;

use App\Models\Discount;
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
        $min = rand(0, 9);
        $products = Product::inRandomOrder()->get();
        Discount::factory($products->count() * 5)
            ->hasAttached($products, [
                'diskon_harga' => rand(5, 100) * 10000,
                'minimal_produk' => $min,
                'maksimal_produk' => rand(0, 9) > $min ? $min + rand(1, 9) : $min,
            ])
            ->create();
    }
}
