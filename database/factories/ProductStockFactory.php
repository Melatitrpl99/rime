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
        $color = Color::pluck('id')->toArray();
        $size = Size::pluck('id')->toArray();
        $dimens = Dimension::pluck('id')->toArray();
        return [
            'color_id' => $this->faker->randomElement($color),
            'size_id' => $this->faker->randomElement($size),
            'dimension_id' => $this->faker->randomElement($dimens),
            'stok_ready' => $this->faker->numberBetween(0, 100),
        ];
    }
}
