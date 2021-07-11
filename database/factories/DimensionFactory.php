<?php

namespace Database\Factories;

use App\Models\Dimension;
use Illuminate\Database\Eloquent\Factories\Factory;

class DimensionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dimension::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dimension = $this->faker->randomNumber(3, true);
        return [
            'name' => $dimension . ' cm x ' . $dimension . ' cm',
        ];
    }
}
