<?php

namespace Database\Factories;

use App\Models\partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class partnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
        'deskripsi' => $this->faker->word,
        'alamat' => $this->faker->word,
        'lokasi' => $this->faker->text,
        'email' => $this->faker->word,
        'no_hp' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
