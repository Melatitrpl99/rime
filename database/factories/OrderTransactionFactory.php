<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $orders = Order::withSum('products as total_diskon', 'order_details.diskon')->get();
        $ids = $orders->pluck('id')->toArray();
        return [
            'nomor'    => $this->faker->regexify('T[0-9]{2}-[A-Z0-9]{6}'),
            'order_id' => $this->faker->randomElement($ids),
            'total'    => function (array $attributes) use ($orders) {
                $order = $orders->firstWhere('id', '==', $attributes['order_id']);
                return $order->total + $order->biaya_pengiriman - $order->total_diskon;
            },
            'tanggal_masuk' => now(),
        ];
    }
}
