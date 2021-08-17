<?php

namespace Database\Seeders;

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
        $this->call(ShipmentsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(CartsSeeder::class);
        $this->call(DiscountsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(SpendingsSeeder::class);
        $this->call(ActivitiesSeeder::class);
        $this->call(TestimonySeeder::class);
    }
}
