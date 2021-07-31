<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $judul = $this->faker->sentence(rand(1, 3));
        return [
            'judul' => $judul,
            'deskripsi' => $this->faker->text(rand(100, 200)),
            'kode' => $this->faker->regexify('[A-Za-z0-9]{8}'),
            'batas_pemakaian' => $this->faker->optional(0.65)->randomDigitNotNull(),
            'waktu_mulai' => $this->faker->dateTime(),
            'waktu_berakhir' => $this->faker->dateTime(),
            'slug' => Str::slug($judul),
        ];
    }
}
