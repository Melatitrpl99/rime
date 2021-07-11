<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $minimal = $this->faker->randomDigit();
        $discount = Discount::inRandomOrder()->pluck('id')->toArray();
        $product = Product::inRandomOrder()->pluck('id')->toArray();
        return [
            'discount_id' => $this->faker->randomElement($discount),
            'product_id' => $this->faker->randomElement($product),
            'diskon_harga' => $this->faker->numberBetween(5000, 55000),
            'minimal_produk' => $minimal,
            'maksimal_produk' => $this->faker->numberBetween($minimal, 12),
        ];
    }
}
