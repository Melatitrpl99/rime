<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck('id')->toArray();
        return [
            'nomor' => $this->faker->regexify('T[0-9]{2}-[A-Z0-9]{6}'),
            // 'total' => $this->faker->numberBetween(50, 5500) * 1000,
            'user_id' => $this->faker->randomElement($user),
        ];
    }
}
