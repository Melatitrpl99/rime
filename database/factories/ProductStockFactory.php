<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Size;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

class ProductStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productId = $this->faker->randomElement(Product::pluck('id')->toArray());
        $colorId = $this->faker->randomElement(Color::pluck('id')->toArray());
        $sizeId = $this->faker->randomElement(Size::pluck('id')->toArray());

        $exists = true;

        while ($exists) {
            $exists = ProductStock::where([
                ['product_id', '=', $productId],
                ['color_id', '=', $colorId],
                ['size_id', '=', $sizeId],
            ])->exists();
        }

        if ($exists) {
            throw new Exception('Duplicate value');
        }

        return [
            'product_id' => $productId,
            'color_id' => $colorId,
            'size_id' => $sizeId,
            'stok_ready' => $this->faker->numberBetween(30, 100),
        ];
    }
}
