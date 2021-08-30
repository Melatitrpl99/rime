<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Http\Request;
use Validator;

/**
 * Class CartAPIController.
 */
class CartAPIController extends Controller
{
    /**
     * Display a listing of the Cart.
     * GET|HEAD /carts.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Cart::query()->where('user_id', auth()->id())
            ->withSum('products as jumlah', 'cart_details.jumlah');

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        $carts = null;

        if ($request->has('per_page')) {
            $carts = $query->simplePaginate($request->get('per_page') ?? 25);
        } else {
            $carts = $query->get();
        }

        return response()->success(CartResource::collection($carts));
    }

    /**
     * Store a newly created Cart in storage.
     * POST /carts.
     *
     * @param \App\Http\Requests\StoreCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreCartAPIRequest $request)
    {
        $user = auth()->user();
        $input = collect($request->validated())
            ->put('user_id', $user->id);

        $pivot = [];
        $total = 0;
        $productId = array_values($request->only('product_id'))[0];
        $colorId = array_values($request->only('color_id'))[0];
        $sizeId = array_values($request->only('size_id'))[0];
        $jumlah = array_values($request->only('jumlah'))[0];

        $products = Product::whereIn('id', $productId)->get();
        $hasRole = $user->hasRole('reseller');

        foreach ($productId as $key => $id) {
            $product = $products->find($id);

            if ($hasRole) {
                $validator = Validator::make([
                    'jumlah' => $jumlah[$key],
                ], [
                    'jumlah' => ['numeric', 'min:' . $product->reseller_minimum],
                ], $messages = [
                    'min' => 'Jumlah pembelian barang ' . $product->nama . ' untuk reseller minimal :min',
                ])->validate();
            }

            $harga = $hasRole ? $product->harga_reseller : $product->harga_reseller;
            $subTotal = $harga * $jumlah[$key];
            $total = $total + $subTotal;

            $pivot[$id] = [
                'color_id' => $colorId[$key],
                'size_id' => $sizeId[$key],
                'jumlah' => $jumlah[$key],
                'sub_total' => $subTotal,
            ];
        }

        $input->put('total', $total);
        $cart = Cart::create($input->toArray());
        $cart->products()->sync($pivot);

        return response()->success(new CartResource($cart), 201);
    }

    /**
     * Display the specified Cart.
     * GET|HEAD /carts/{$cart}.
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Cart $cart)
    {
        if ($cart->user_id != auth()->id()) {
            return response()->unauthorized();
        }

        $cart->load('products.image')
            ->loadSum('products as jumlah', 'cart_details.jumlah');

        return response()->success(new CartResource($cart));
    }

    /**
     * Update the specified Cart in storage.
     * PUT/PATCH /carts/{$cart}.
     *
     * @param \App\Models\Cart $cart
     * @param \App\Http\Requests\UpdateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Cart $cart, UpdateCartAPIRequest $request)
    {
        $user = auth()->user();
        $input = collect($request->validated())
            ->put('user_id', $user->id);

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah'])) {

            $products = Product::whereIn('id', $request->product_id)->get();
            $hasRole = $user->hasRole('reseller');

            $pivot = [];
            $total = 0;
            $productId = array_values($request->only('product_id'))[0];
            $colorId = array_values($request->only('color_id'))[0];
            $sizeId = array_values($request->only('size_id'))[0];
            $jumlah = array_values($request->only('jumlah'))[0];

            foreach ($productId as $key => $id) {
                $product = $products->find($id);

                if ($hasRole) {
                    $validator = Validator::make([
                        'jumlah' => $jumlah[$key],
                    ], [
                        'jumlah' => ['numeric', 'min:' . $product->reseller_minimum],
                    ], $messages = [
                        'min' => 'Jumlah pembelian barang ' . $product->nama . ' untuk reseller minimal :min',
                    ])->validate();
                }

                $harga = $hasRole ? $product->harga_reseller : $product->harga_reseller;
                $subTotal = $harga * $jumlah[$key];
                $total = $total + $subTotal;

                $pivot[$id] = [
                    'color_id' => $colorId[$key],
                    'size_id' => $sizeId[$key],
                    'jumlah' => $jumlah[$key],
                    'sub_total' => $subTotal,
                ];
            }

            $input->put('total', $total);
            $cart->products()->sync($pivot);
        }

        $cart->update($input->toArray());

        $cart->loadSum('products as jumlah', 'cart_details.jumlah');

        return response()->success(new CartResource($cart));
    }

    /**
     * Remove the specified Cart from storage.
     * DELETE /carts/{$id}.
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Cart $cart)
    {
        if ($cart->user_id != auth()->id()) {
            return response()->unauthorized();
        }

        $cart->products()->detach();
        $cart->delete();

        return response()->success(null, 200, 'Keranjang berhasil dihapus');
    }
}
