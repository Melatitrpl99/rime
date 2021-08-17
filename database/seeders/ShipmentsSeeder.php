<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Seeder;

class ShipmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipment::factory()
            ->count(rand(5, 50))
            ->create();
    }
}
