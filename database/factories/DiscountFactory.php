<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul'           => $this->faker->words(rand(3, 6), true),
            'deskripsi'       => $this->faker->text,
            'kode'            => $this->faker->regexify('[A-Za-z0-9]{8}'),
            'batas_pemakaian' => $this->faker->randomDigitNotNull,
            'waktu_mulai'     => now(),
            'waktu_berakhir'  => now()->addDays(rand(5, 25)),
        ];
    }
}
