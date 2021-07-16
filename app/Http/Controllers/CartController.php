<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Models\Cart;
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
        $carts = Cart::all();

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
        $cart = Cart::create($request->validated());

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
        $cart = Cart::find($id);

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
        $cart = Cart::find($id);
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

        $cart->update($request->validated());

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

        $cart->delete();

        flash('Cart deleted successfully.', 'success');

        return redirect()->route('admin.carts.index');
    }
}