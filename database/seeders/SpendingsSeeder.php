<?php

namespace Database\Seeders;

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
        Spending::factory()
            ->count(rand(15, 100))
            ->has(SpendingDetail::factory()->count(rand(3, 10)))
            ->create()
            ->each(function ($spending) {
                //
                $spending->update(['total' => $spending->spendingDetails()->sum('sub_total')]);
            });
    }
}
