<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserShipment;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserShipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $villageIds = Village::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        return [
            'alamat'     => $this->faker->address,
            'kode_pos'   => $this->faker->numberBetween(10000, 99999),
            'catatan'    => $this->faker->realText,
            'village_id' => $this->faker->randomElement($villageIds),
            'user_id'    => $this->faker->randomelement($userIds),
        ];
    }
}
