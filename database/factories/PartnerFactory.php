<?php

namespace Database\Factories;

use App\Models\Partner;
use App\Models\Regency;
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
        $lokasi = Regency::inRandomOrder()->pluck('id');
        return [
            'nama' => $this->faker->name,
            'deskripsi' => $this->faker->paragraph(rand(5, 12)),
            'alamat' => $this->faker->address(),
            'lokasi' => $this->faker->randomElement($lokasi),
            'email' => $this->faker->safeEmail(),
            'no_hp' => $this->faker->phoneNumber(),
        ];
    }
}
