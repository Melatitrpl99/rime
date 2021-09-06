<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\OrderDetail;
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

        $colorIds = Color::pluck('id')->toArray();
        $sizeIds = Size::pluck('id')->toArray();

        return [
            'color_id' => $this->faker->unique(true)->randomElement($colorIds),
            'size_id'  => $this->faker->unique(true)->randomElement($sizeIds),
        ];
    }
}
