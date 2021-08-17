<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
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

        if ($request->has('user_id')) {
            $query->where('user_id', $request->get('user_id'));
        }

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $carts = $query->where('user_id', auth()->id())->get();

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
        $user = auth()->user();
        $cart = Cart::make($request->validated());
        $cart->user_id = $user->id;

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = $user->hasRole('reseller');
            $total = 0;

            foreach ($request->product_id as $key => $productId) {
                $jumlah = $request->jumlah[$key];
                $product = $products->find($productId);
                $subTotal = $role
                    ? $product->harga_reseller * $jumlah
                    : $product->harga_customer * $jumlah;

                $total += $subTotal;

                $cart->total = $total;
                $cart->save();

                if ($role && $jumlah < $product->reseller_minimum) {
                    $cart->products()->detach();
                    $cart->forceDelete();

                    return response()->json([
                        'message' => 'Jumlah minimum pembelian untuk reseller kurang.'
                    ], 422);
                }

                $cart->products()->attach($productId, [
                    'color_id'     => $request->color_id[$key],
                    'size_id'      => $request->size_id[$key],
                    'jumlah'       => $jumlah,
                    'sub_total'    => $subTotal
                ]);
            }
        } else {
            $cart->save();
        }

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
        if ($cart->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

        $cart->load('products');

        return response()->json(new CartResource($cart), 200);
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
        if ($cart->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

        $old = $cart->load([
            'products:id,nama,harga_customer,harga_reseller',
        ])->replicate();

        $sync = $old->products->map(function ($item, $key) {
            return $item->pivot;
        })->toArray();

        $cart->update($request->validated());

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah'])) {
            $cart->products()->detach();
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = auth()->user()->hasRole('reseller');
            $total = 0;

            foreach ($request->product_id as $key => $productId) {
                $jumlah = $request->jumlah[$key];
                $product = $products->find($productId);
                $subTotal = $role
                    ? $product->harga_reseller * $jumlah
                    : $product->harga_customer * $jumlah;

                $total += $subTotal;

                $cart->total = $total;
                $cart->save();

                if ($role && $jumlah < $product->reseller_minimum) {
                    $cart->products()->detach();
                    $cart->update($old->toArray());
                    foreach ($sync as $key => $item) {
                        $cart->products()->attach($item['product_id'], $item);
                    }

                    return response()->json([
                        'message' => 'Jumlah minimum pembelian untuk reseller kurang.'
                    ], 422);
                }

                $cart->products()->attach($productId, [
                    'color_id'     => $request->color_id[$key],
                    'size_id'      => $request->size_id[$key],
                    'jumlah'       => $jumlah,
                    'sub_total'    => $subTotal
                ]);
            }
        }

        return response()->json(new CartResource($cart), 200);
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
        if ($cart->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

        $cart->products()->detach();
        $cart->delete();

        return response()->json(null, 204);
    }
}
