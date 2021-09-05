<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Testimony;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimony::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productId = $this->faker->randomElement(Product::pluck('id')->toArray());
        $userId = $this->faker->randomElement(User::pluck('id')->toArray());

        $exists = true;

        while ($exists) {
            $exists = Testimony::where([
                ['product_id', '=', $productId],
                ['user_id', '=', $userId],
            ])->exists();
        }

        if ($exists) {
            throw new Exception('Duplicate value');
        }

        return [
            'judul'      => $this->faker->words(rand(3, 6), true),
            'isi'        => $this->faker->text,
            'review'     => $this->faker->numberBetween(1, 5),
            'product_id' => $productId,
            'user_id'    => $userId,
        ];
    }
}
