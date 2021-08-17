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
            ->create();
    }
}
