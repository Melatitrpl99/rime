<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\Size;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $colors = Color::inRandomOrder()->pluck('id')->toArray();
        $sizes = Size::inRandomOrder()->pluck('id')->toArray();
        $dimensions = Dimension::inRandomOrder()->pluck('id')->toArray();
        $jumlah = rand(1, 50);

        Order::factory(rand(100, 250))
            ->has(Shipment::factory()->count(1))
            ->hasAttached($products, [
                'color_id' => array_rand($colors, 1),
                'size_id' => array_rand($sizes, 1),
                'dimension_id' => array_rand($dimensions, 1),
                'jumlah' => $jumlah,
                'subtotal' => rand(5, 100) * 1000 * $jumlah
            ])
            ->create([
                'total' => rand(50, 100) * 1000,
                'diskon' => rand(5, 50) * 1000,
                'biaya_pengiriman' => rand(5, 50) * 1000,
            ]);
    }
}
