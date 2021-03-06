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
        $category = Category::pluck('id')->toArray();
        return [
            'nama' => $this->faker->sentence(rand(1, 5)),
            'deskripsi' => $this->faker->paragraph(rand(2, 5)),
            'harga_customer' => $this->faker->numberBetween(50, 200) * 1000,
            'harga_reseller' => function (array $attributes) {
                return $attributes['harga_customer'] - rand(1, 30) * 1000;
            },
            'reseller_minimum' => $this->faker->randomDigit(),
            'category_id' => $this->faker->randomElement($category),
        ];
    }
}
