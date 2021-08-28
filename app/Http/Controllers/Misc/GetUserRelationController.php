<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\UserShipment;
use Form;
use Illuminate\Http\Request;

class GetUserRelationController extends Controller
{
    public function getCarts(Request $request)
    {
        $carts = Cart::where('user_id', $request->get('user_id'))->get();

        return $carts;
    }

    public function getCartDetails(Request $request)
    {
        $cart = Cart::with(['products', 'products.pivot.color', 'products.pivot.size'])
            ->find($request->get('cart_id'));

        $out = "";

        foreach ($cart->products as $product) {
            $harga = $cart->user->hasRole('reseller')
                ? $product->harga_reseller
                : $product->harga_customer;

            $out .= "<tr>
                <td class='py-0.5'>" . Form::checkbox('row_product', '1', null, ['class' => 'form-control']) . "</td>
            <td><input type='hidden' name='product_id[]' value='{$product->id}'>
                <span>{$product->nama}</span>
            </td>
            <td><input type='hidden' name='color_id[]' value='{$product->pivot->color_id}'>
                <span>{$product->pivot->color->name}</span>
            </td>
            <td><input type='hidden' name='size_id[]' value='{$product->pivot->size_id}'>
                <span>{$product->pivot->size->name}</span>
            </td>
            <td class='text-right'>
                <input type='hidden' name='harga[]' value='{$harga}'>
                <span>" . rp($harga) . "</span>
            </td>
            <td class='text-right'>
                <input type='hidden' name='jumlah[]' value='{$product->pivot->jumlah}'>
                <span>" . numerify($product->pivot->jumlah) . "</span>
            </td>
            <td class='text-right'>
                <input type='hidden' name='sub_total[]' value='{$product->pivot->sub_total}'>
                <span>" . rp($product->pivot->sub_total) . "</span>
            </td>
        </tr>";
        }

        // dd($cart);

        return $out;
    }

    public function getOrders(Request $request)
    {
        $orders = Order::where('user_id', $request->get('user_id'))->get();

        return $orders;
    }

    public function getOrderDetails(Request $request)
    {
        //
    }

    public function getShippingAddresses(Request $request)
    {
        $userShipments = UserShipment::where('user_id', $request->get('user_id'))->get();

        return $userShipments;
    }
}
