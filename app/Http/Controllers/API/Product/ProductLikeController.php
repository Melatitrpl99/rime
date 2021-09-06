<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductLikeController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $product->users()->attach(auth()->id());

        $product->load([
            'productCategory',
            'productStocks',
            'productStocks.color',
            'productStocks.size',
            'images',
            'testimonies.user.avatar',
        ])
            ->loadSum('productStocks', 'stok_ready')
            ->loadCount('users as likes')
            ->loadAvg('testimonies', 'rating')
            ->loadCount('testimonies');

        return response()->json(new ProductDetailResource($product));
    }
}
