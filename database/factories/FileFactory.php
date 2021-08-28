<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Storage;
use Str;

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
        $name = $this->faker->words(rand(3, 6), true);
        $name = Str::slug($name);

        $baseDir = storage_path('app\\public\\files');
        if (!file_exists($baseDir)) {
            mkdir($baseDir);
        }

        $dir = $baseDir . '\\' . $name;

        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $img = $this->faker->image($dir, 500, 500);

        $path = Str::after($img, 'public\\');
        $path = Str::replace('\\', '/', $path);
        $path = 'storage/' . $path;

        return [
            'name'          => $name,
            'mime_type'     => "image/png",
            'format'        => Str::afterLast($img, '.'),
            'size'          => rand(1024, 1536),
            'path'          => $path,
            'url'           => asset($path),
        ];
    }
}
