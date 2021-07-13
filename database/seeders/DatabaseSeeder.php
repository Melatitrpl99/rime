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
        $this->call(IndoRegionSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(CartsSeeder::class);
        $this->call(DiscountsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(TransactionsSeeder::class);
    }
}
