<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Flash;
use Response;

class CartController extends Controller
{
    /**
     * Display a listing of the Cart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Cart $carts */
        $carts = Cart::paginate();

        return view('admin.carts.index')
            ->with('carts', $carts);
    }

    /**
     * Show the form for creating a new Cart.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.carts.create');
    }

    /**
     * Store a newly created Cart in storage.
     *
     * @param CreateCartRequest $request
     *
     * @return Response
     */
    public function store(CreateCartRequest $request)
    {
        $input = $request->all();

        /** @var Cart $cart */
        $cart = Cart::create($input);

        Flash::success('Cart saved successfully.');

        return redirect(route('admin.carts.index'));
    }

    /**
     * Display the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('admin.carts.index'));
        }

        return view('admin.carts.show')->with('cart', $cart);
    }

    /**
     * Show the form for editing the specified Cart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('admin.carts.index'));
        }

        return view('admin.carts.edit')->with('cart', $cart);
    }

    /**
     * Update the specified Cart in storage.
     *
     * @param int $id
     * @param UpdateCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartRequest $request)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('admin.carts.index'));
        }

        $cart->fill($request->all());
        $cart->save();

        Flash::success('Cart updated successfully.');

        return redirect(route('admin.carts.index'));
    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cart $cart */
        $cart = Cart::find($id);

        if (empty($cart)) {
            Flash::error('Cart not found');

            return redirect(route('admin.carts.index'));
        }

        $cart->delete();

        Flash::success('Cart deleted successfully.');

        return redirect(route('admin.carts.index'));
    }
}
