<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::factory()
            ->count(rand(10, 250))
            ->create();
    }
}
