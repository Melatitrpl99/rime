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
        $village = Village::inRandomOrder()->first();
        $order = Order::inRandomOrder()->pluck('id')->toArray();
        return [
            'nama_lengkap' => $this->faker->name,
            'alamat' => $this->faker->address(),
            'no' => $this->faker->numberBetween(1, 100),
            'rt' => $this->faker->numberBetween(1, 100),
            'rw' => $this->faker->numberBetween(1, 100),
            'desa_kelurahan' => $village->name,
            'kecamatan' => $village->district->name,
            'kabupaten_kota' => $village->district->regency->name,
            'provinsi' => $village->district->regency->province->name,
            'catatan' => $this->faker->paragraph(rand(3, 8)),
            'kode_pos' => $this->faker->numberBetween(1000, 99999),
            'order_id' => $this->faker->randomElement($order);
        ];
    }
}
