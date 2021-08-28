<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $totalUser = User::count();
        $totalReseller = User::role('reseller')->count();
        $totalProdukTerjual = Order::where('status_id', 5)
            ->withSum('products as total_produk', 'order_details.jumlah')
            ->get('total_produk')
            ->sum('total_produk');

        return view('admin.home', compact('totalUser', 'totalReseller', 'totalProdukTerjual'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
