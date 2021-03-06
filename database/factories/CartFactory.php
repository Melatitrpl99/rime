<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomor' => $this->faker->regexify('C[0-9]{2}-[A-Z0-9]{6}'),
            'judul' => $this->faker->sentence(rand(1, 5)),
            'deskripsi' => $this->faker->text(rand(100, 200)),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
