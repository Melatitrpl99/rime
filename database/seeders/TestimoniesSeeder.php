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
            Testimony::chunk(2, function ($testimony) {
                $testimony->factory()
                    ->count(rand(5, 30))
                    ->create();
            });
        } catch (Exception $e) {
            //
        }
    }
}
