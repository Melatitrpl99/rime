<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CartController
 * @package App\Http\Controllers
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
        $carts = Cart::with('user')->paginate(15);

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
     * @param \App\Http\Requests\CreateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateCartRequest $request)
    {
        $faker = \Faker\Factory::create();
        $nomor = $faker->regexify('C[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor)
            ->toArray();

        $cart = Cart::create($input);

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah', 'sub_total'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = User::where('id', $request->user_id)->first()->hasRole('reseller');

            foreach ($request->product_id as $key => $productId) {
                $jumlah = $request->jumlah[$key];
                $product = $products->find($productId);

                if ($role && $jumlah < $product->reseller_minimum) {
                    $cart->products()->detach();
                    $cart->forceDelete();

                    flash('Jumlah minimum pembelian untuk reseller kurang.', 'danger');

                    return redirect()->route('admin.carts.index');
                }

                $cart->products()->attach($productId, [
                    'color_id'     => $request->color_id[$key],
                    'size_id'      => $request->size_id[$key],
                    'jumlah'       => $jumlah,
                    'sub_total'    => $role
                        ? $product->harga_reseller * $jumlah
                        : $product->harga_customer * $jumlah
                ]);
            }
        }

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
            'products.pivot.size:id,name'
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
        $old = $cart->load([
            'products:id,nama,harga_customer,harga_reseller',
        ])->replicate();

        $sync = $old->products->mapWithKeys(function ($item, $key) {
            return [$item->id => $item->pivot];
        })->toArray();

        $cart->update($request->validated());

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah', 'sub_total'])) {
            $cart->products()->detach();

            $products = Product::whereIn('id', $request->product_id)->get();
            $role = User::where('id', $request->user_id)->first()->hasRole('reseller');

            foreach ($request->product_id as $key => $productId) {
                $jumlah = $request->jumlah[$key];
                $product = $products->find($productId);

                if ($role && $jumlah < $product->reseller_minimum) {
                    $cart->products()->detach();
                    $cart->update($old->toArray());
                    $cart->products()->attach($sync);

                    flash('Jumlah minimum pembelian untuk reseller kurang.', 'danger');

                    return redirect()->route('admin.carts.index');
                }

                $cart->products()->attach($productId, [
                    'color_id'     => $request->color_id[$key],
                    'size_id'      => $request->size_id[$key],
                    'jumlah'       => $jumlah,
                    'sub_total'    => $role
                        ? $product->harga_reseller * $jumlah
                        : $product->harga_customer * $jumlah
                ]);
            }
        }

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
