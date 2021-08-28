<?php

namespace Database\Factories;

use App\Models\SpendingDetail;
use App\Models\SpendingUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpendingDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpendingDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $spendingUnitIds = SpendingUnit::pluck('id')->toArray();
        return [
            'nama'         => $this->faker->words(rand(3, 6), true),
            'ket'          => $this->faker->text,
            'harga_satuan' => $this->faker->numberBetween(1, 15) * 1000,
            'jumlah'       => $this->faker->randomDigitNotNull,
            'sub_total'    => function (array $attributes) {
                return $attributes['harga_satuan'] * $attributes['jumlah'];
            },
            'spending_unit_id' => $this->faker->randomElement($spendingUnitIds),
        ];
    }
}
