<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Shipment;
use App\Models\Size;
use App\Models\Transaction;
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

        Product::factory(50)
            ->has(ProductStock::factory()->count(rand(3, 15)))
            ->create();
    }
}
