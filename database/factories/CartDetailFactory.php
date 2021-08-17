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
        return [
            'color_id' => $this->faker->randomElement($colors),
            'size_id'  => $this->faker->randomElement($sizes),
        ];
    }
}
