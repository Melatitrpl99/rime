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
            'discount_id' => $this->faker->word,
        'product_id' => $this->faker->word,
        'diskon_harga' => $this->faker->randomDigitNotNull,
        'minimal_produk' => $this->faker->randomDigitNotNull,
        'maksimal_produk' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
