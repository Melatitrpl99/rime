<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $input = collect($request->validated());
        $nomor = $faker->regexify('C[0-9]{2}-[A-Z0-9]{6}');
        $input->put('nomor', $nomor);

        // dd($request->all());
        $cart = Cart::create($input->toArray());

        if ($request->hasAny(['product_id', 'color_id', 'dimension_id', 'size_id', 'jumlah', 'sub_total'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = auth()->user()->hasRole('reseller');
            foreach($request->product_id as $key => $productId) {
                $cart->products()->attach($productId, [
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                    'dimension_id' => $request->dimension_id[$key],
                    'jumlah' => $request->jumlah[$key],
                    'sub_total' => $role ? $products[$key]->harga_reseller : $products[$key]->harga_customer
                ]);
            }
        }

        flash('Cart saved successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }

    /**
     * Display the specified Cart.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $cart = Cart::with(['user', 'products.pivot.color', 'products.pivot.dimension', 'products.pivot.size'])->find($id);

        if (empty($cart)) {
            flash('Cart not found', 'error');

            return redirect()->route('admin.carts.index');
        }

        return view('admin.carts.show')
            ->with('cart', $cart);
    }

    /**
     * Show the form for editing the specified Cart.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $cart = Cart::with(['user', 'products.pivot.color', 'products.pivot.dimension', 'products.pivot.size'])->find($id);
        if (empty($cart)) {
            flash('Cart not found', 'error');

            return redirect()->route('admin.carts.index');
        }

        return view('admin.carts.edit')
            ->with('cart', $cart);
    }

    /**
     * Update the specified Cart in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateCartRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateCartRequest $request)
    {
        $cart = Cart::find($id);

        if (empty($cart)) {
            flash('Cart not found', 'error');

            return redirect()->route('admin.carts.index');
        }

        $cart->products()->detach();
        $cart->update($request->validated());

        if ($request->hasAny(['product_id', 'color_id', 'dimension_id', 'size_id', 'jumlah', 'sub_total'])) {
            foreach($request->product_id as $key => $product) {
                $cart->products()->attach($product, [
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                    'dimension_id' => $request->dimension_id[$key],
                    'jumlah' => $request->jumlah[$key],
                    'sub_total' => $request->sub_total[$key]
                ]);
            }
        }

        flash('Cart updated successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if (empty($cart)) {
            flash('Cart not found', 'error');

            return redirect()->route('admin.carts.index');
        }

        $cart->products()->detach();
        $cart->delete();

        flash('Cart deleted successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }
}
