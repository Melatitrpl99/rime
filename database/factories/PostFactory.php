<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $postCategoryIds = PostCategory::pluck('id')->toArray();

        return [
            'judul'            => $this->faker->words(rand(3, 6), true),
            'konten'           => $this->faker->text,
            'front_page'       => $this->faker->boolean,
            'post_category_id' => $this->faker->randomElement($postCategoryIds),
            'user_id'          => 1,
        ];
    }
}
