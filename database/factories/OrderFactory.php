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
        $user = User::inRandomOrder()->pluck('id')->toArray();
        $status => Status::inRandomOrder()->pluck('id')-toArray();
        return [
            'nomor' => $this->faker->regexify('[A-Za-z]{2}[0-9]{4}'),
            'pesan' => $this->faker->text(rand(50, 150)),
            'kode_diskon' => $this->faker->regexify('[A-Za-z]{5}[0-9]{3}'),
            'status_id' => $this->faker->randomElement($status),
            'user_id' => $this->faker->randomElement($user),
        ];
    }
}
