<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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
        Transaction::factory()
            ->count(rand(10, 25))
            ->create()
            ->each(function ($transaction) {
                $orders = Order::inRandomOrder()
                    ->limit(rand(1, Order::count()))
                    ->with('products')
                    ->get();

                $total = 0;

                foreach($orders as $order) {
                    $transaction->orders()->attach($order);
                    $total += $order->products->sum('pivot.diskon');
                }

                $totalTrans = $transaction->orders->sum('total') + $transaction->orders->sum('biaya_pengiriman');

                $transaction->update([
                    'total' => $totalTrans - $total
                ]);
            });
    }
}
