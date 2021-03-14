<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'nama' => $this->faker->word,
        'deskripsi' => $this->faker->word,
        'stok' => $this->faker->randomDigitNotNull,
        'harga_customer' => $this->faker->randomDigitNotNull,
        'harga_reseller' => $this->faker->randomDigitNotNull,
        'grosir_minimum' => $this->faker->randomDigitNotNull,
        'warna' => $this->faker->word,
        'ukuran' => $this->faker->word,
        'slug' => $this->faker->word,
        'category_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
