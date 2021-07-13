<?php

namespace Database\Factories;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpendingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spending::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomor' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'deskripsi' => $this->faker->paragraph(rand(5, 10)),
            'tanggal' => $this->faker->date(),
            'kategori' => $this->faker->word(),
            'qty' => $this->faker->numberBetween(1, 99),
            'sub_total' => $this->faker->numberBetween(10000, 10000000),
        ];
    }
}
