<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\PostCategory;
use App\Models\Size;
use App\Models\Status;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            ['name' => 'Belum order', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sedang Diproses', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sedang Dikemas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dalam Pengiriman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Selesai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ditunda', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dibatalkan', 'created_at' => now(), 'updated_at' => now()]
        ]);

        Size::insert([
            ['name' => 'XXXL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'XXL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'XL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'L', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'M', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'XS', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Dimension::insert([
            ['name' => '140cm x 140cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '135cm x 135cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '125cm x 125cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '120cm x 120cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '110cm x 110cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '100cm x 100cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '95cm x 95cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '90cm x 90cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '80cm x 80cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '75cm x 75cm', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '70cm x 70cm', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Color::factory(10)->create();
        Category::factory(5)->create();
        PostCategory::factory(5)->create();
    }
}
