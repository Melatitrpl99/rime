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

        Dimension::factory(10)->create();
        Color::factory(50)->create();
        Category::factory(15)->create();
        PostCategory::factory(15)->create();
    }
}
