<?php

namespace Database\Factories;

use App\Models\DiscountDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiscountDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diskon_harga' => $this->faker->numberBetween(5, 50) * 1000,
            'minimal_produk' => $this->faker->randomDigit(),
            'maksimal_produk' => function (array $attributes) {
                $max = $this->faker->randomDigitNotNull();
                return $attributes['minimal_produk'] <= $max ? $max : $attributes['minimal_produk'] + $this->faker->randomDigitNotNull();
            },
        ];
    }
}
