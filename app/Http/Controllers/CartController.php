<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CartController.
 */
class CartController extends Controller
{
    /**
     * Display a listing of the Cart.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $carts = Cart::orderByDesc('updated_at')
            ->with('user')
            ->paginate(15);

        // dd($carts);

        return view('admin.carts.index')
            ->with('carts', $carts);
    }

    /**
     * Show the form for creating a new Cart.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.carts.create');
    }

    /**
     * Store a newly created Cart in storage.
     *
     * @param \App\Http\Requests\StoreCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreCartRequest $request)
    {
        $input = collect($request->validated());

        $pivot = [];
        $total = 0;
        $productId = array_values($request->only('product_id'))[0];
        $colorId = array_values($request->only('color_id'))[0];
        $sizeId = array_values($request->only('size_id'))[0];
        $jumlah = array_values($request->only('jumlah'))[0];

        $products = Product::whereIn('id', $productId)->get();
        $hasRole = User::where('id', $request->user_id)->first()->hasRole('reseller');

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

            $harga = $hasRole ? $product->harga_reseller : $product->harga_customer;
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

        flash('Cart saved successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }

    /**
     * Display the specified Cart.
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Cart $cart)
    {
        $cart->load([
            'products:id,nama,harga_customer,harga_reseller',
            'products.pivot.color:id,name',
            'products.pivot.size:id,name',
            'user',
        ]);

        return view('admin.carts.show')
            ->with('cart', $cart);
    }

    /**
     * Show the form for editing the specified Cart.
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Cart $cart)
    {
        return view('admin.carts.edit')
            ->with('cart', $cart);
    }

    /**
     * Update the specified Cart in storage.
     *
     * @param \App\Models\Cart $cart
     * @param \App\Http\Requests\UpdateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Cart $cart, UpdateCartRequest $request)
    {
        $input = collect($request->validated());

        $products = Product::whereIn('id', $request->product_id)->get();
        $hasRole = User::where('id', $request->user_id)->first()->hasRole('reseller');

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

            $harga = $hasRole ? $product->harga_reseller : $product->harga_customer;
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
        $cart->update($input->toArray());
        $cart->products()->sync($pivot);

        flash('Cart updated successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param \App\Models\Cart $cart
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->products()->detach();
        $cart->delete();

        flash('Cart deleted successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }
}
