<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
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
        $productCategoryIds = ProductCategory::pluck('id')->toArray();
        return [
            'nama'           => $this->faker->words(rand(3, 6), true),
            'deskripsi'      => $this->faker->text,
            'harga_customer' => $this->faker->numberBetween(35, 150) * 1000,
            'harga_reseller' => function (array $attributes) {
                return $attributes['harga_customer'] - ($attributes['harga_customer'] * 0.085);
            },
            'reseller_minimum'    => $this->faker->randomDigitNotNull,
            'product_category_id' => $this->faker->randomElement($productCategoryIds),
        ];
    }
}
