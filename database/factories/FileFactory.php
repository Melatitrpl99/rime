<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = Product::all();
        $names = $products->pluck('nama', 'id')->toArray();
        $ids = $products->pluck('id')->toArray();
        $rand = $this->faker->randomElement($ids);
        return [
            'name' => Str::slug(Str::lower($names[$rand])),
            'fileable_type' => 'App\Models\Product',
            'fileable_id' => $rand,
            'mime_type' => $this->faker->mimeType(),
            'format' => $this->faker->fileExtension(),
            'size' => $this->faker->numberBetween(1, 2500),
            'path' => $this->faker->filePath(),
            'url' => $this->faker->imageUrl(500, 500)
        ];
    }
}
