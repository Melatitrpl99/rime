<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->sentence(rand(1,5));
        $category = Category::pluck('id')->toArray();
        return [
            'nama' => $nama,
            'deskripsi' => $this->faker->paragraph(rand(2, 5)),
            'harga_customer' => $this->faker->numberBetween(50, 200) * 1000,
            'harga_reseller' => $this->faker->numberBetween(30, 150) * 1000,
            'reseller_minimum' => $this->faker->randomDigit(),
            'slug' => Str::slug($nama),
            'category_id' => $this->faker->randomElement($category),
        ];
    }
}
