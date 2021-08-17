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
            'name'          => Str::slug(Str::lower($names[$rand])),
            'fileable_type' => 'App\Models\Product',
            'fileable_id'   => $rand,
            'mime_type'     => $this->faker->mimeType(),
            'format'        => $this->faker->fileExtension(),
            'size'          => $this->faker->numberBetween(1, 2500),
            'path'          => function (array $attributes) {
                $path = 'storage\\product\\' . $attributes['name'];
                $dir = public_path($path);
                if (!file_exists($dir)) {
                    mkdir($dir);
                }
                $out = $this->faker->image($dir, 500, 500);
                $out = Str::after($out, 'public\\');
                $out = Str::replace('\\', '/', $out);

                return $out;
            },
            'url'           => function (array $attributes) {
                return asset($attributes['path']);
            }
        ];
    }
}
