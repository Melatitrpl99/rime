<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

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
        $order = Order::inRandomOrder()->pluck('id')->toArray()
        $jumlah = $this->faker->numberBetween(0, 100);
        return [
            'order_id' => $this->faker->randomElement($cart),
            'product_id' => $this->faker->randomElement($product),
            'color_id' => $this->faker->randomElement($color),
            'size_id' => $this->faker->randomElement($size),
            'dimension_id' => $this->faker->randomElement($dimens),
            'jumlah' => $jumlah,
            'subtotal' => $this->faker->randomElement([$product->harga_customer, $product->harga_reseller]) * $jumlah,
        ];
    }
}
