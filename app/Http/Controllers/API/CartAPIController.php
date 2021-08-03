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
     * GET|HEAD /carts/{userId}
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index($userId, Request $request)
    {
        $query = Cart::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $carts = $query->where('user_id', $userId)->get();

        return response()->json(CartResource::collection($carts));
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

        return response()->json(new CartResource($cart));
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{$cart}
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Cart $cart)
    {
        $cart->load('products');

        return response()->json(new CartResource($cart));
    }

    /**
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{$cart}
     *
     * @param \App\Models\Cart $cart
     * @param \App\Http\Requests\UpdateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Cart $cart, UpdateCartAPIRequest $request)
    {
        $cart->update($request->validated());

        return response()->json(new CartResource($cart));
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{$id}
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->products()->detach();
        $cart->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}