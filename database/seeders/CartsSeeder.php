<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
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
        Cart::factory()
            ->count(rand(15, 50))
            ->create()
            ->each(function ($cart) {
                $products = Product::inRandomOrder()
                    ->limit(rand(1, Product::count()))
                    ->get();

                foreach($products as $product) {
                    $jumlah = rand(1, 5);
                    $cart->products()->attach($product, array_merge(
                        CartDetail::factory()->make()->toArray(),
                        ['jumlah' => $jumlah, 'sub_total' => $product->harga_customer * $jumlah]
                    ));
                }

                $cart->update([
                    'total' => $cart->products->sum('pivot.sub_total')
                ]);
            });
    }
}
