<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Shipment;
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
        $users = User::pluck('id')->toArray();
        $statuses = Status::pluck('id')->toArray();
        $shipments = Shipment::pluck('id')->toArray();
        $discounts = Discount::pluck('kode')->toArray();
        return [
            'nomor'            => $this->faker->regexify('O[0-9]{2}-[A-Z0-9]{6}'),
            'pesan'            => $this->faker->text(rand(50, 150)),
            'kode_diskon'      => $this->faker->optional(0.8)->randomElement($discounts),
            'biaya_pengiriman' => $this->faker->numberBetween(40, 120) * 1000,
            'berat'            => $this->faker->numberBetween(20, 1000) * 10,
            'status_id'        => $this->faker->randomElement($statuses),
            'shipment_id'      => $this->faker->randomElement($shipments),
            'user_id'          => $this->faker->randomElement($users),
        ];
    }
}
