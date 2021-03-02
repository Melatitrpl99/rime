<?php

namespace Database\Factories;

use App\Models\report;
use Illuminate\Database\Eloquent\Factories\Factory;

class reportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word,
        'deskripsi' => $this->faker->word,
        'is_import' => $this->faker->randomDigitNotNull,
        'slug' => $this->faker->word,
        'detail_laporan' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
