<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colors = Color::pluck('id')->toArray();
        $sizes = Size::pluck('id')->toArray();
        $dimens = Dimension::pluck('id')->toArray();
        return [
            'color_id' => $this->faker->randomElement($colors),
            'size_id' => $this->faker->optional(0.45)->randomElement($sizes),
            'dimension_id' => function (array $attributes) use ($dimens) {
                return $attributes['size_id'] == null
                    ? $this->faker->randomElement($dimens)
                    : null;
            },
            'stok_ready' => $this->faker->numberBetween(1, 100),
        ];
    }
}
