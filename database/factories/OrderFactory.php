<?php

namespace Database\Factories;

use App\Models\Discount;
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
        $diskon = Discount::pluck('kode')->toArray();
        return [
            'nomor' => $this->faker->regexify('O[0-9]{2}-[A-Z0-9]{6}'),
            'pesan' => $this->faker->text(rand(50, 150)),
            // 'total' => $this->faker->biasedNumberBetween(),
            'kode_diskon' => $this->faker->optional(0.8)->randomElement($diskon),
            'biaya_pengiriman' => $this->faker->numberBetween(5, 250) * 1000,
            'status_id' => $this->faker->randomElement($status),
            'user_id' => $this->faker->randomElement($user),
        ];
    }
}
