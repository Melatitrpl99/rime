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
        $judul = $this->faker->sentence(rand(3, 10));
        return [
            'judul' => $judul,
            'deskripsi' => function () {
                $desc = '';
                for ($i = 0; $i < rand(2, 5); $i++) {
                    $desc += '<p>'.$this->faker->paragraph(rand(3, 12)).'</p>';
                }
                return $desc;
            },
            'waktu_mulai' => $this->faker->dateTime(),
            'waktu_selesai' => $this->faker->dateTimeBetween('now', '+1 month'),
            'alamat' => $this->faker->address(),
            'nomor_hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'slug' => Str::slug($judul),
        ];
    }
}
