<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

/**
 * Class DiscountController
 * @package App\Http\Controllers
 */
class DiscountController extends Controller
{
    /**
     * Display a listing of the Discount.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $discounts = Discount::all();

        return view('admin.discounts.index')
            ->with('discounts', $discounts);
    }

    /**
     * Show the form for creating a new Discount.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created Discount in storage.
     *
     * @param \App\Http\Requests\CreateDiscountRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateDiscountRequest $request)
    {
        $discount = Discount::create($request->validated());

        flash('Discount saved successfully.', 'success');

        return redirect()->route('admin.discounts.index');
    }

    /**
     * Display the specified Discount.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $discount = Discount::find($id);

        if (empty($discount)) {
            flash('Discount not found', 'error');

            return redirect()->route('admin.discounts.index');
        }

        return view('admin.discounts.show')
            ->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified Discount.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $discount = Discount::find($id);
        if (empty($discount)) {
            flash('Discount not found', 'error');

            return redirect()->route('admin.discounts.index');
        }

        return view('admin.discounts.edit')
            ->with('discount', $discount);
    }

    /**
     * Update the specified Discount in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateDiscountRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateDiscountRequest $request)
    {
        $discount = Discount::find($id);

        if (empty($discount)) {
            flash('Discount not found', 'error');

            return redirect()->route('admin.discounts.index');
        }

        $discount->update($request->validated());

        flash('Discount updated successfully.', 'success');

        return redirect()->route('admin.discounts.index');
    }

    /**
     * Remove the specified Discount from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $discount = Discount::find($id);

        if (empty($discount)) {
            flash('Discount not found', 'error');

            return redirect()->route('admin.discounts.index');
        }

        $discount->delete();

        flash('Discount deleted successfully.', 'success');

        return redirect()->route('admin.discounts.index');
    }
}