<?php

namespace Database\Factories;

use App\Models\CartDetail;
use App\Models\Color;
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
     */
    public function definition(): array
    {
        $colorIds = Color::pluck('id')->toArray();
        $sizeIds = Size::pluck('id')->toArray();

        return [
            'color_id' => $this->faker->unique(true)->randomElement($colorIds),
            'size_id'  => $this->faker->unique(true)->randomElement($sizeIds),
        ];
    }
}
