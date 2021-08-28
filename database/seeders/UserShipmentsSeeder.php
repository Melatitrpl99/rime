<?php

namespace Database\Seeders;

use App\Models\UserShipment;
use Illuminate\Database\Seeder;

class UserShipmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserShipment::factory()
            ->count(rand(5, 50))
            ->create();
    }
}
