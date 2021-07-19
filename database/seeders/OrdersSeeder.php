<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shipment;
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
        Order::factory()
            ->count(rand(50, 500))
            ->has(Shipment::factory())
            ->create()
            ->each(function ($order) {
                $products = Product::inRandomOrder()
                    ->limit(rand(1, Product::count()))
                    ->get();

                foreach($products as $product) {
                    $jumlah = rand(1, 10);
                    $order->products()->attach($product, array_merge(
                        OrderDetail::factory()->make()->toArray(),
                        ['jumlah' => $jumlah, 'sub_total' => $product->harga_customer * $jumlah]
                    ));
                }

                $order->update([
                    'total' => $order->products->sum('pivot.sub_total')
                ]);
            });
    }
}
