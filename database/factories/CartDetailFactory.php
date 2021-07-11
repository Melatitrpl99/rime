<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CartDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = Color::inRandomOrder()->pluck('id')->toArray();
        $size = Size::inRandomOrder()->pluck('id')->toArray();
        $dimens = Dimension::inRandomOrder()->pluck('id')->toArray();
        $product = Product::inRandomOrder()->pluck('id')->toArray();
        $cart = Cart::inRandomOrder()->pluck('id')->toArray();
        $jumlah = $this->faker->numberBetween(0, 100);
        return [
            'cart_id' => $this->faker->randomElement($cart),
            'product_id' => $this->faker->randomElement($product),
            'color_id' => $this->faker->randomElement($color),
            'size_id' => $this->faker->randomElement($size),
            'dimension_id' => $this->faker->randomElement($dimens),
            'jumlah' => $jumlah,
            'subtotal' => $this->faker->randomElement([$product->harga_customer, $product->harga_reseller]) * $jumlah,
        ];
    }
}
