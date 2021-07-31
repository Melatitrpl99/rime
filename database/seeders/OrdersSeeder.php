<?php

namespace Database\Seeders;

use App\Models\Discount;
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
            ->count(rand(10, 50))
            ->has(Shipment::factory())
            ->create()
            ->each(function ($order) {
                $diskon = Discount::where('kode', $order->kode_diskon)
                    ->with('products')
                    ->first();

                $upperLimit = rand(1, 7);
                $products = Product::inRandomOrder()
                    ->limit(rand(1, Product::count() - $upperLimit))
                    ->get();

                foreach($products as $product) {
                    $jumlah = rand(1, 8);
                    $d = (!empty($diskon) || !is_null($diskon)) ? optional($diskon->products->find($product))->pivot : null;

                    $order->products()->attach($product, array_merge(
                        OrderDetail::factory()->make()->toArray(),
                        [
                            'jumlah' => $jumlah,
                            'diskon' => ($jumlah > optional($d)->minimal_produk && $jumlah < optional($d)->maksimal_produk) ? optional($d)->diskon_harga : null,
                            'sub_total' => $order->user->hasRole('reseller')
                                ? $product->harga_reseller * $jumlah
                                : $product->harga_customer * $jumlah
                        ]
                    ));
                }

                $order->update([
                    'total' => $order->products->sum('pivot.sub_total')
                ]);
            });
    }
}
