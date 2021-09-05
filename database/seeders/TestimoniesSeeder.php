<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Exception;
use Illuminate\Database\Seeder;

class TestimoniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Testimony::factory()
                ->count(rand(10, 250))
                ->create();
        } catch (Exception $e) {
            //
        }
    }
}
