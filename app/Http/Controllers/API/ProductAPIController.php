<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductAPIController.
 */
class ProductAPIController extends Controller
{
    /**
     * Display a listing of the Product.
     * GET|HEAD /products.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->get('skip')) {
            $products->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $products->limit($request->get('limit'));
        }

        $products = $products->withSum('productStocks', 'stok_ready')
            ->withAvg('testimonies', 'rating')
            ->withCount('testimonies')
            ->with('image')
            ->get();

        return response()->json(ProductResource::collection($products));
    }

    /**
     * Display the specified Product.
     * GET|HEAD /products/{$id}.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Product $product)
    {
        // dd($product->harga);
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
            ->loadExists('users as liked')
            ->loadCount(['testimonies', 'users as likes']);

        return response()->json(new ProductDetailResource($product));
    }
}
