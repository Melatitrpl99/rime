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
            'tanggal' => $this->faker->date('Y-m-d H:i:s'),
        'nomor' => $this->faker->randomDigitNotNull,
        'kategori' => $this->faker->word,
        'deskripsi' => $this->faker->text,
        'jumlah_barang' => $this->faker->randomDigitNotNull,
        'total' => $this->faker->randomDigitNotNull,
        'biaya_tambahan' => $this->faker->randomDigitNotNull,
        'sub_total' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
