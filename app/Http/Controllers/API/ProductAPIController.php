<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductAPIRequest;
use App\Http\Requests\API\UpdateProductAPIRequest;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $products = $query->with(['category'])
            ->withSum('productStocks', 'stok_ready')
            ->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => ProductResource::collection($products)
        ]);
    }

    /**
     * Display the specified Product.
     * GET|HEAD /products/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $product = Product::with(['category', 'productStocks'])
            ->find($id);

        if (empty($product)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new ProductResource($product)
        ]);
    }

    /**
     * Update the specified Product in storage.
     * PUT/PATCH /products/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateProductRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateProductAPIRequest $request)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $product->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new ProductResource($product)
        ]);
    }

    /**
     * Remove the specified Product from storage.
     * DELETE /products/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $product->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}
