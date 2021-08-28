<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->count(rand(5, 25))
            ->hasImages(File::factory()->count(rand(1, 4)))
            ->create();
    }
}
