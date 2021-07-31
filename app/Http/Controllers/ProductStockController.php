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
        $productStocks = ProductStock::with([
            'product:id,nama',
            'color:id,name',
            'size:id,name',
            'dimension:id,name'
        ])->paginate(15);

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
        ProductStock::create($request->validated());

        flash('Product Stock saved successfully.', 'success');

        return redirect()->route('admin.product_stocks.index');
    }

    /**
     * Display the specified ProductStock.
     *
     * @param \App\Models\ProductStock $productStock
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(ProductStock $productStock)
    {
        return view('admin.product_stocks.show')
            ->with('productStock', $productStock);
    }

    /**
     * Show the form for editing the specified ProductStock.
     *
     * @param \App\Models\ProductStock $productStock
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(ProductStock $productStock)
    {
        return view('admin.product_stocks.edit')
            ->with('productStock', $productStock);
    }

    /**
     * Update the specified ProductStock in storage.
     *
     * @param \App\Models\ProductStock $productStock
     * @param \App\Http\Requests\UpdateProductStockRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(ProductStock $productStock, UpdateProductStockRequest $request)
    {
        $productStock->update($request->validated());

        flash('Product Stock updated successfully.', 'success');

        return redirect()->route('admin.product_stocks.index');
    }

    /**
     * Remove the specified ProductStock from storage.
     *
     * @param \App\Models\ProductStock $productStock
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(ProductStock $productStock)
    {
        $productStock->delete();

        flash('Product Stock deleted successfully.', 'success');

        return redirect()->route('admin.product_stocks.index');
    }
}
