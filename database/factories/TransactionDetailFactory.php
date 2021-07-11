<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransactionDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $transaction = Transaction::inRandomOrder()->pluck('id')->toArray();
        $order = Order::inRandomOrder()->first();
        return [
            'transaction_id' => $this->faker->randomElement($transaction),
            'order_id' => $this->faker->randomElement($order),
            'sub_total' => $this->faker->numberBetween(200000, 10000000),
        ];
    }
}
