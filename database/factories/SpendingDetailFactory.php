<?php

namespace Database\Factories;

use App\Models\SpendingDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpendingDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpendingDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->sentence(rand(3, 6)),
            'sub_total' => $this->faker->numberBetween(5, 50) * 1000
        ];
    }
}
