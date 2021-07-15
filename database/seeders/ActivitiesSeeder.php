<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::factory(500)
            ->for(User::factory(), 'loggable')
            ->create();
    }
}