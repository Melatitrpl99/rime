<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Shipment;
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
        $village = Village::pluck('id')->toArray();
        return [
            'alamat' => $this->faker->address,
            'no' => $this->faker->numberBetween(1, 199),
            'rt' => $this->faker->numberBetween(1, 99),
            'rw' => $this->faker->numberBetween(1, 49),
            'village_id' => $this->faker->randomElement($village),
            'kode_pos' => $this->faker->numberBetween(1000, 49000),
            'catatan' => $this->faker->text(200)
        ];
    }
}
