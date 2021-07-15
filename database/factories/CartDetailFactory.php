<?php

namespace Database\Factories;

use App\Models\CartDetail;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product;
use App\Models\Size;
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
        $colors = Color::inRandomOrder()->pluck('id')->toArray();
        $sizes = Size::inRandomOrder()->pluck('id')->toArray();
        $dimensions = Dimension::inRandomOrder()->pluck('id')->toArray();
        // $jumlah = $this->faker->numberBetween(1, 50);
        return [
            'color_id' => $this->faker->randomElement($colors),
            'size_id' => $this->faker->randomElement($sizes),
            'dimension_id' => $this->faker->randomElement($dimensions),
            // 'jumlah' => $jumlah,
            // 'sub_total' => function (array $attributes) use ($jumlah) {
            //     return Product::find($attributes['product_id'])->harga_customer * $jumlah;
            // }
        ];
    }
}
