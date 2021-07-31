<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Dimension;
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
        $colors = Color::inRandomOrder()->pluck('id')->toArray();
        $sizes = Size::inRandomOrder()->pluck('id')->toArray();
        $dimens = Dimension::inRandomOrder()->pluck('id')->toArray();
        return [
            'color_id' => $this->faker->randomElement($colors),
            'size_id' => $this->faker->optional(0.45)->randomElement($sizes),
            'dimension_id' => function (array $attributes) use ($dimens) {
                return $attributes['size_id'] == null
                    ? $this->faker->randomElement($dimens)
                    : null;
            }
        ];
    }
}
