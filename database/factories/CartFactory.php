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
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        return [
            'judul'     => $this->faker->words(rand(3, 6), true),
            'deskripsi' => $this->faker->text,
            'user_id'   => $this->faker->randomElement($userIds),
        ];
    }
}
