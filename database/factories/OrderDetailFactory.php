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
        $dimensions = Dimension::inRandomOrder()->pluck('id')->toArray();
        return [
            'color_id' => $this->faker->randomElement($colors),
            'size_id' => $this->faker->randomElement($sizes),
            'dimension_id' => $this->faker->randomElement($dimensions)
        ];
    }
}
