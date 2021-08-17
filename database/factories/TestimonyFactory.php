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
        $products = Product::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        return [
            'product_id' => $this->faker->randomElement($products),
            'user_id' => $this->faker->randomElement($users),
            'judul' => $this->faker->sentence(),
            'isi' => $this->faker->text(250),
            'review' => $this->faker->numberBetween(1, 5)
        ];
    }
}
