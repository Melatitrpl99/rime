<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class ProductLikeController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $product->users()->syncWithoutDetaching(auth()->id(), ['liked_at' => now()]);

        $likes = DB::table('product_likes')
            ->select(DB::raw('COUNT(*) AS likes'))
            ->whereNotNull('liked_at')
            ->first();

        return response()->json($likes->likes);
    }

    public function destroy(Product $product)
    {
        $product->users()->detach(auth()->id());

        $likes = DB::table('product_likes')
            ->select(DB::raw('COUNT(*) AS likes'))
            ->whereNotNull('liked_at')
            ->first();

        return response()->json($likes->likes);
    }
}
