<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'      => $this->faker->company,
            'deskripsi' => $this->faker->realText,
            'alamat'    => $this->faker->streetAddress,
            'lokasi'    => $this->faker->city,
            'email'     => $this->faker->companyEmail,
            'no_telp'   => $this->faker->phoneNumber,
        ];
    }
}
