<?php

namespace App\Http\Controllers\API\Details;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CartDetailAPIRequest;
use App\Http\Requests\API\CartDetailModifyProductAPIRequest;
use App\Http\Requests\API\CartDetailModifyProductsAPIRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;

class CartDetailAPIController extends Controller
{
    public function addProduct(Cart $cart, CartDetailAPIRequest $request)
    {
        $productId = $request->product_id;
        $colorId = $request->color_id;
        $sizeId = $request->size_id;
        $jumlah = $request->jumlah;

        $product = Product::find($productId);

        $pivot[$productId] = [
            'color_id'  => $colorId,
            'size_id'   => $sizeId,
            'jumlah'    => $jumlah,
            'sub_total' => $jumlah * $product->harga,
        ];

        $query = $cart->products()
            ->wherePivot('product_id', $productId)
            ->wherePivot('color_id', $colorId)
            ->wherePivot('size_id', $sizeId);

        $exist = $query->exists();

        if (!$exist) {
            $cart->products()->attach($pivot);
            $cart->update(['total' => $cart->products()->sum('cart_details.sub_total')]);
        }

        return response()->json(new CartResource(
            $cart->load('products.image')
                ->loadSum('products as jumlah', 'cart_details.jumlah')
        ));
    }

    public function updateProduct(Cart $cart, CartDetailModifyProductsAPIRequest $request)
    {
        if ($cart->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $productIds = $request->product_id;
        $colorIds = $request->color_id;
        $sizeIds = $request->size_id;
        $jumlah = $request->jumlah;

        $products = Product::whereIn('id', $productIds)->get();

        $pivot = [];
        $total = 0;

        foreach ($productIds as $key => $id) {
            $product = $products->find($id);

            $subTotal = $jumlah[$key] * $product->harga;
            $total += $subTotal;

            $pivot[$id] = [
                'color_id'  => $colorIds[$key],
                'size_id'   => $sizeIds[$key],
                'jumlah'    => $jumlah[$key],
                'sub_total' => $subTotal,
            ];
        }

        $cart->products()->syncWithoutDetaching($pivot);
        $cart->update(['total' => $cart->products()->sum('cart_details.sub_total')]);

        return response()->json(new CartResource(
            $cart->load('products.image')
                ->loadSum('products as jumlah', 'cart_details.jumlah')
        ));
    }

    public function removeProduct(Cart $cart, CartDetailModifyProductsAPIRequest $request)
    {
        $cart->products()->detach($request->product_id);
        $cart->update(['total' => $cart->products()->sum('cart_details.sub_total')]);

        return response()->json(new CartResource(
            $cart->load('products.image')
                ->loadSum('products as jumlah', 'cart_details.jumlah')
        ));
    }
}
