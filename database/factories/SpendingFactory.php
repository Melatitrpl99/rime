<?php

namespace Database\Factories;

use App\Models\Spending;
use App\Models\SpendingCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpendingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spending::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $spendingCategoryIds = SpendingCategory::pluck('id')->toArray();

        return [
            'nomor'                => $this->faker->regexify('S[0-9]{2}-[A-Z0-9]{6}'),
            'judul'                => $this->faker->words(rand(3, 6), true),
            'deskripsi'            => $this->faker->text,
            'spending_category_id' => $this->faker->randomElement($spendingCategoryIds),
        ];
    }
}
