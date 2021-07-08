<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Response;

/**
 * Class CartController
 * @package App\Http\Controllers\API
 */

class CartAPIController extends Controller
{
    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts
     *
     * @param Request $request
     * @return Response
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

        return response()->json(CartResource::collection($carts));
    }

    /**
     * Store a newly created Cart in storage.
     * POST /carts
     *
     * @param CreateCartAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCartAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cart $cart */
        $cart = Cart::create($input);

        return response()->json(new CartResource($cart));
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        return response()->json(new CartResource($cart));
    }

    /**
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{id}
     *
     * @param int $id
     * @param UpdateCartAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartAPIRequest $request)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart->fill($request->all());
        $cart->save();

        return response()->json(new CartResource($cart));
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            return $this->sendError('Cart not found');
        }

        $cart->delete();

        return response()->json('Cart deleted successfully');
    }
}
