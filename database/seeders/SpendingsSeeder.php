<?php

namespace Database\Seeders;

use App\Models\Spending;
use App\Models\SpendingDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spending::factory()
            ->count(rand(15, 500))
            ->has(SpendingDetail::factory()->count(rand(3, 10)))
            ->create();
    }
}
