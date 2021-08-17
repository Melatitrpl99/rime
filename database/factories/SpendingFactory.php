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
            'nomor'     => $this->faker->regexify('S[0-9]{2}-[A-Z0-9]{4}'),
            'deskripsi' => $this->faker->paragraph(rand(5, 10)),
            'tanggal'   => $this->faker->dateTime(),
            'kategori'  => $this->faker->word(),
            'qty'       => $this->faker->numberBetween(1, 99),
            'total'     => $this->faker->numberBetween(100, 50000) * 1000,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Spending $spending) {
            $spending->total = $spending->spendingDetails->sum('sub_total');
        });
    }
}
