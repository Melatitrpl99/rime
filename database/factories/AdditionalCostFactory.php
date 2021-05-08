<?php

namespace Database\Factories;

use App\Models\AdditionalCost;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdditionalCostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdditionalCost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal' => $this->faker->date('Y-m-d H:i:s'),
        'nomor' => $this->faker->randomDigitNotNull,
        'nama' => $this->faker->word,
        'deskripsi' => $this->faker->text,
        'total' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
