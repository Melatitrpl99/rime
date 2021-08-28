<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Color::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => trim(strtolower(implode(' ', preg_split('/(?=[A-Z])/', $this->faker->colorName)))),
            'rgba_color' => $this->faker->hexColor,
        ];
    }
}
