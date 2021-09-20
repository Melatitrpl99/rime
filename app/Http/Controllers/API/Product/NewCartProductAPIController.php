<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewCartProductResource;
use App\Models\Product;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class NewCartProductAPIController extends Controller
{
    public function __invoke($id, $colorId, $sizeId, Request $request)
    {
        $productStock = ProductStock::whereProductId($id)
            ->whereColorId($colorId)
            ->whereSizeId($sizeId);

        $exists = $productStock->exists();
        if (!$exists) {
            return response()->json(['message' => 'Tidak ada warna dan ukuran yang ditemukan dari produk ini']);
        }

        $product = $productStock->with(['product.image', 'color', 'size'])->first();

        return response()->json(new NewCartProductResource($product), 200);
    }
}
