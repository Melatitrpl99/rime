<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiscountController extends Controller
{
    /**
     * Display a listing of the Discount.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Discount $discounts */
        $discounts = Discount::paginate();

        return view('admin.discounts.index')
            ->with('discounts', $discounts);
    }

    /**
     * Show the form for creating a new Discount.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created Discount in storage.
     *
     * @param CreateDiscountRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscountRequest $request)
    {
        $input = $request->all();

        /** @var Discount $discount */
        $discount = Discount::create($input);

        Flash::success('Discount saved successfully.');

        return redirect(route('admin.discounts.index'));
    }

    /**
     * Display the specified Discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('admin.discounts.index'));
        }

        return view('admin.discounts.show')->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified Discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('admin.discounts.index'));
        }

        return view('admin.discounts.edit')->with('discount', $discount);
    }

    /**
     * Update the specified Discount in storage.
     *
     * @param int $id
     * @param UpdateDiscountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscountRequest $request)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('admin.discounts.index'));
        }

        $discount->fill($request->all());
        $discount->save();

        Flash::success('Discount updated successfully.');

        return redirect(route('admin.discounts.index'));
    }

    /**
     * Remove the specified Discount from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Discount $discount */
        $discount = Discount::find($id);

        if (empty($discount)) {
            Flash::error('Discount not found');

            return redirect(route('admin.discounts.index'));
        }

        $discount->delete();

        Flash::success('Discount deleted successfully.');

        return redirect(route('admin.discounts.index'));
    }
}
