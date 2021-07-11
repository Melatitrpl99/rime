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
        $user = User::inRandomOrder()->pluck('id')->toArray();
        return [
            'nomor' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'total' => $this->faker->numberBetween(1000000, 25000000),
            'user_id' => $this->faker->randomElement($user),
        ];
    }
}
