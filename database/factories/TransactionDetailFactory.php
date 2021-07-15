<?php

namespace Database\Factories;

use App\Models\Order;
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
        return [
            'sub_total' => function (array $attributes) {
                $order = Order::find($attributes['order_id']);
                return $order->total + $order->biaya_pengiriman - $order->diskon;
            }
        ];
    }
}
