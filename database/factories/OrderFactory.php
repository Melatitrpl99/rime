<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Status;
use App\Models\User;
use App\Models\UserShipment;
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
        $statusIds = Status::pluck('id')->toArray();
        $userId = $this->faker->randomElement(User::pluck('id')->toArray());
        $discountIds = Discount::pluck('id')->toArray();
        $shipmentIds = UserShipment::where('user_id', $userId)->pluck('id')->toArray();
        $paymentMethodIds = PaymentMethod::pluck('id')->toArray();

        return [
            'nomor'             => $this->faker->regexify('O[0-9]{2}-[A-Z0-9]{6}'),
            'pesan'             => $this->faker->realText,
            'biaya_pengiriman'  => $this->faker->numberBetween(5, 100) * 1000,
            'berat'             => $this->faker->numberBetween(10, 400) * 10,
            'kode_resi'         => $this->faker->regexify('[a-z0-9]{16}'),
            'payment_method_id' => $this->faker->randomElement($paymentMethodIds),
            'discount_id'       => $this->faker->randomElement($discountIds),
            'status_id'         => $this->faker->randomElement($statusIds),
            'user_shipment_id'  => $this->faker->randomElement($shipmentIds),
            'user_id'           => $userId,
        ];
    }
}
