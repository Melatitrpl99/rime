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
        $this->call(UsersSeeder::class);
        $this->call(IndoRegionSeeder::class);
        $this->call(CategoriesSeeder::class);
        // $this->call(ActivitiesSeeder::class);
        // $this->call(ProductsSeeder::class);
        // $this->call(DiscountsSeeder::class);
        // $this->call(CartsSeeder::class);
        // $this->call(UserShipmentsSeeder::class);
        // $this->call(OrdersSeeder::class);
        // $this->call(SpendingsSeeder::class);
        // $this->call(TestimoniesSeeder::class);
        // $this->call(PostsSeeder::class);
    }
}
