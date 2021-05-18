<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartDetailRequest;
use App\Http\Requests\UpdateCartDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Flash;
use Response;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the CartDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var CartDetail $cartDetails */
        $cartDetails = CartDetail::all();

        return view('admin.cart_details.index')
            ->with('cartDetails', $cartDetails);
    }

    /**
     * Show the form for creating a new CartDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cart_details.create');
    }

    /**
     * Store a newly created CartDetail in storage.
     *
     * @param CreateCartDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateCartDetailRequest $request)
    {
        $input = $request->all();

        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::create($input);

        Flash::success('Cart Detail saved successfully.');

        return redirect(route('admin.cartDetails.index'));
    }

    /**
     * Display the specified CartDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('admin.cartDetails.index'));
        }

        return view('admin.cart_details.show')->with('cartDetail', $cartDetail);
    }

    /**
     * Show the form for editing the specified CartDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('admin.cartDetails.index'));
        }

        return view('admin.cart_details.edit')->with('cartDetail', $cartDetail);
    }

    /**
     * Update the specified CartDetail in storage.
     *
     * @param int $id
     * @param UpdateCartDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCartDetailRequest $request)
    {
        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('admin.cartDetails.index'));
        }

        $cartDetail->fill($request->all());
        $cartDetail->save();

        Flash::success('Cart Detail updated successfully.');

        return redirect(route('admin.cartDetails.index'));
    }

    /**
     * Remove the specified CartDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CartDetail $cartDetail */
        $cartDetail = CartDetail::find($id);

        if (empty($cartDetail)) {
            Flash::error('Cart Detail not found');

            return redirect(route('admin.cartDetails.index'));
        }

        $cartDetail->delete();

        Flash::success('Cart Detail deleted successfully.');

        return redirect(route('admin.cartDetails.index'));
    }
}
