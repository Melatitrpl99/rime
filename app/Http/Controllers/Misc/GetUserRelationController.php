<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\UserShipment;
use DB;
use Debugbar;
use Form;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Route;

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

        return $cart->products;
    }

    public function getOrders(Request $request)
    {
        Debugbar::disable();

        $orders = Order::where('user_id', $request->get('user_id'))
            ->doesntHave('orderTransactions')
            ->pluck('nomor', 'id');

        return $orders;
    }

    public function getOrderDetails(Request $request)
    {
        $withRole = [
            'products:id,nama,harga_reseller as harga',
            'products.pivot.color:id,name',
            'products.pivot.size:id,name',
            'status:id,name',
            'userShipment:id,alamat',
            'discount:id,kode',
        ];

        $withoutRole = [
            'products:id,nama,harga_customer as harga',
            'products.pivot.color:id,name',
            'products.pivot.size:id,name',
            'status:id,name',
            'userShipment:id,alamat',
            'discount:id,kode',
        ];

        $orderDetail = Order::find($request->get('order_id'));

        $orderDetail->load($orderDetail->user->hasRole('reseller') ? $withRole : $withoutRole);

        return $orderDetail;
    }

    public function getShippingAddresses(Request $request)
    {
        $userShipments = UserShipment::where('user_id', $request->get('user_id'))->get();

        return $userShipments;
    }
}
