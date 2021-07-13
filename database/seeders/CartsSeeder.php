<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::inRandomOrder()->get();
        $colors = Color::inRandomOrder()->pluck('id')->toArray();
        $sizes = Size::inRandomOrder()->pluck('id')->toArray();
        $dimensions = Dimension::inRandomOrder()->pluck('id')->toArray();
        $jumlah = rand(1, 50);
        Cart::factory(rand(50, 500))
            ->hasAttached($products, [
                'color_id' => array_rand($colors, 1),
                'size_id' => array_rand($sizes, 1),
                'dimension_id' => array_rand($dimensions, 1),
                'jumlah' => $jumlah,
                'subtotal' => rand(50, 100) * 1000 * $jumlah,
            ])
            ->create([
                'total' => rand(50, 100) * 1000
            ]);
    }
}
