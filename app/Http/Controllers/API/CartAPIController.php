<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

/**
 * Class CartAPIController
 * @package App\Http\Controllers\API
 */
class CartAPIController extends Controller
{
    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Cart::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $carts = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => CartResource::collection($carts)
        ]);
    }

    /**
     * Store a newly created Cart in storage.
     * POST /carts
     *
     * @param \App\Http\Requests\CreateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateCartAPIRequest $request)
    {
        $cart = Cart::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new CartResource($cart)
        ]);
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $cart = Cart::with('products')->find($id);

        if (empty($cart)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new CartResource($cart)
        ]);
    }

    /**
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateCartAPIRequest $request)
    {
        $cart = Cart::find($id);

        if (empty($cart)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $cart->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new CartResource($cart)
        ]);
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (empty($cart)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $cart->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}