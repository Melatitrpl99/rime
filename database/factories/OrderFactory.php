<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck('id')->toArray();
        $status = Status::pluck('id')->toArray();
        return [
            'nomor' => $this->faker->regexify('O[0-9]{2}-[A-Z0-9]{6}'),
            'pesan' => $this->faker->text(rand(50, 150)),
            // 'total' => $this->faker->numberBetween(50, 10000) * 1000,
            'diskon' => $this->faker->numberBetween(5, 100) * 1000,
            'biaya_pengiriman' => $this->faker->numberBetween(5, 50) * 1000,
            'status_id' => $this->faker->randomElement($status),
            'user_id' => $this->faker->randomElement($user),
        ];
    }
}
