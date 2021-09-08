<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Size;
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
        $colorIds = Color::pluck('id')->toArray();
        $sizeIds = Size::pluck('id')->toArray();

        return [
            'nama'         => $this->faker->words(rand(3, 6), true),
            'ket'          => $this->faker->text,
            'harga_satuan' => $this->faker->numberBetween(5, 50) * 1000,
            'jumlah_item'  => $this->faker->randomDigitNotNull,
            'jumlah_stok'  => $this->faker->numberBetween(5, 20),
            'sub_total'    => function (array $attributes) {
                return $attributes['harga_satuan'] * $attributes['jumlah_item'];
            },
            'spending_unit_id' => $this->faker->randomElement($spendingUnitIds),
            'color_id'         => $this->faker->randomElement($colorIds),
            'size_id'          => $this->faker->randomElement($sizeIds),
        ];
    }
}
