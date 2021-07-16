<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductStockRequest;
use App\Http\Requests\UpdateProductStockRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use Illuminate\Http\Request;

/**
 * Class ProductStockController
 * @package App\Http\Controllers
 */
class ProductStockController extends Controller
{
    /**
     * Display a listing of the ProductStock.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $productStocks = ProductStock::all();

        return view('admin.product_stocks.index')
            ->with('productStocks', $productStocks);
    }

    /**
     * Show the form for creating a new ProductStock.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.product_stocks.create');
    }

    /**
     * Store a newly created ProductStock in storage.
     *
     * @param \App\Http\Requests\CreateProductStockRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateProductStockRequest $request)
    {
        $productStock = ProductStock::create($request->validated());

        flash('Product Stock saved successfully.', 'success');

        return redirect()->route('admin.product_stocks.index');
    }

    /**
     * Display the specified ProductStock.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            flash('Product Stock not found', 'error');

            return redirect()->route('admin.product_stocks.index');
        }

        return view('admin.product_stocks.show')
            ->with('productStock', $productStock);
    }

    /**
     * Show the form for editing the specified ProductStock.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $productStock = ProductStock::find($id);
        if (empty($productStock)) {
            flash('Product Stock not found', 'error');

            return redirect()->route('admin.product_stocks.index');
        }

        return view('admin.product_stocks.edit')
            ->with('productStock', $productStock);
    }

    /**
     * Update the specified ProductStock in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateProductStockRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateProductStockRequest $request)
    {
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            flash('Product Stock not found', 'error');

            return redirect()->route('admin.product_stocks.index');
        }

        $productStock->update($request->validated());

        flash('Product Stock updated successfully.', 'success');

        return redirect()->route('admin.product_stocks.index');
    }

    /**
     * Remove the specified ProductStock from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            flash('Product Stock not found', 'error');

            return redirect()->route('admin.product_stocks.index');
        }

        $productStock->delete();

        flash('Product Stock deleted successfully.', 'success');

        return redirect()->route('admin.product_stocks.index');
    }
}