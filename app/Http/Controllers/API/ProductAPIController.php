<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductAPIController
 * @package App\Http\Controllers\API
 */
class ProductAPIController extends Controller
{
    /**
     * Display a listing of the Product.
     * GET|HEAD /products
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $products = $query->withSum('productStocks', 'stok_ready')
            ->with(['files', 'category'])
            ->get();

        return response()->json(ProductResource::collection($products), 200);
    }

    /**
     * Display the specified Product.
     * GET|HEAD /products/{$id}
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Product $product)
    {
        $product->load(['category', 'productStocks']);

        return response()->json(new ProductResource($product), 200);
    }
}
