<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Product;
use App\Models\Spending;
use App\Models\SpendingDetail;
use Illuminate\Database\Seeder;

class SpendingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        Spending::factory()
            ->count(rand(15, 40))
            ->create()
            ->each(function ($spending) {
                $productIds = Product::pluck('id')->toArray();

                $total = 0;
                for ($i = 0; $i < rand(1, Product::count()); $i++) {
                    //
                    $spending->products()->attach($productIds[$i], SpendingDetail::factory()->make()->toArray());
                }

                $spending->update(['total' => $spending->products()->sum('spending_details.sub_total')]);
            });
    }
}
