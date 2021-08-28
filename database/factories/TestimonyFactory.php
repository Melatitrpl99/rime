<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Testimony;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimony::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productIds = Product::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        return [
            'judul'      => $this->faker->words(rand(3, 6), true),
            'isi'        => $this->faker->text,
            'review'     => $this->faker->numberBetween(1, 5),
            'product_id' => $this->faker->randomElement($productIds),
            'user_id'    => $this->faker->randomElement($userIds),
        ];
    }
}
