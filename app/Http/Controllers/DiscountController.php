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
        $discounts = Discount::paginate(15);

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
        // dd($request->all());
        $discount = Discount::create($request->validated());

        if ($request->has(['product_id', 'diskon_harga', 'minimal_produk', 'maksimal_produk'])) {
            foreach ($request->product_id as $key => $productId) {
                $discount->products()->attach($productId, [
                    'diskon_harga'    => $request->diskon_harga[$key],
                    'minimal_produk'  => $request->minimal_produk[$key],
                    'maksimal_produk' => $request->maksimal_produk[$key]
                ]);
            }
        }

        flash('Discount saved successfully.', 'success');

        return redirect()->route('admin.discounts.index');
    }

    /**
     * Display the specified Discount.
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Discount $discount)
    {
        $discount->load('products');

        return view('admin.discounts.show')
            ->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified Discount.
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit')
            ->with('discount', $discount);
    }

    /**
     * Update the specified Discount in storage.
     *
     * @param \App\Models\Discount $discount
     * @param \App\Http\Requests\UpdateDiscountRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Discount $discount, UpdateDiscountRequest $request)
    {
        $discount->update($request->validated());

        if ($request->has(['product_id', 'diskon_harga', 'minimal_produk', 'maksimal_produk'])) {
            $discount->products()->detach(null, false);
            foreach ($request->product_id as $key => $productId) {
                $discount->products()->attach($productId, [
                    'diskon_harga'    => $request->diskon_harga[$key],
                    'minimal_produk'  => $request->minimal_produk[$key],
                    'maksimal_produk' => $request->maksimal_produk[$key]
                ]);
            }
        }

        flash('Discount updated successfully.', 'success');

        return redirect()->route('admin.discounts.index');
    }

    /**
     * Remove the specified Discount from storage.
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->products()->detach(null, false);
        $discount->delete();

        flash('Discount deleted successfully.', 'success');

        return redirect()->route('admin.discounts.index');
    }
}
