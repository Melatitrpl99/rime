<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        Transaction::factory(rand(25, 250))
            ->hasAttached($orders, [
                'sub_total' => rand(100, 1500) * 1000
            ])
            ->create([
                'total' => rand(100, 1500) * 1000
            ]);
    }
}
