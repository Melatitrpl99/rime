<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $judul = $this->faker->sentence(rand(5, 12));
        return [
            'judul' => $judul,
            'konten' => function () {
                $desc = '';
                for ($i = 0; $i < rand(2, 7); $i++) {
                    $desc += '<p>'.$this->faker->paragraph(rand(3, 12)).'</p>';
                }
                return $desc;
            },
            'slug' => Str::slug($judul),
        ];
    }
}
