<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Discount;
use App\Models\DiscountDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Size;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'asdf',
            'email' => 'asdf@asdf.com',
            'password' => bcrypt('asdfasdf')
        ]);

        Category::factory(3)->create();
        PostCategory::factory(3)->create();
        Color::factory(3)->create();
        Dimension::factory(3)->create();
        Size::factory(3)->create();
        Status::factory(4)->create();
        Product::factory(5)->create();
        ProductStock::factory(15)->create();
        Discount::factory(2)->create();
        DiscountDetail::factory(3)->create();
        Cart::factory(1)->create();
        CartDetail::factory(3)->create();
        Order::factory(1)->create();
        OrderDetail::factory(3)->create();
        Transaction::factory(1)->create();
        TransactionDetail::factory(3)->create();

        $this->call(IndoRegionSeeder::class);
    }
}
