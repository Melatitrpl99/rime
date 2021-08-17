<?php

namespace Database\Factories;

use App\Models\Shipment;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $villages = Village::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        return [
            'alamat'     => $this->faker->address,
            'village_id' => $this->faker->randomElement($villages),
            'user_id'    => $this->faker->randomElement($users),
            'kode_pos'   => $this->faker->numberBetween(1000, 49000),
            'catatan'    => $this->faker->text(200)
        ];
    }
}
