<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word,
        'deskripsi' => $this->faker->text,
        'waktu_mulai' => $this->faker->date('Y-m-d H:i:s'),
        'waktu_berakhir' => $this->faker->date('Y-m-d H:i:s'),
        'alamat' => $this->faker->text,
        'nomor_hp' => $this->faker->word,
        'email' => $this->faker->word,
        'slug' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
