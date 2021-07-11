<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductStockRequest;
use App\Http\Requests\UpdateProductStockRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductStockController extends Controller
{
    /**
     * Display a listing of the ProductStock.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ProductStock $productStocks */
        $productStocks = ProductStock::all();

        return view('admin.product_stocks.index')
            ->with('productStocks', $productStocks);
    }

    /**
     * Show the form for creating a new ProductStock.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product_stocks.create');
    }

    /**
     * Store a newly created ProductStock in storage.
     *
     * @param CreateProductStockRequest $request
     *
     * @return Response
     */
    public function store(CreateProductStockRequest $request)
    {
        $input = $request->all();

        /** @var ProductStock $productStock */
        $productStock = ProductStock::create($input);

        Flash::success('Product Stock saved successfully.');

        return redirect(route('admin.product_stocks.index'));
    }

    /**
     * Display the specified ProductStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            Flash::error('Product Stock not found');

            return redirect(route('admin.product_stocks.index'));
        }

        return view('admin.product_stocks.show')->with('productStock', $productStock);
    }

    /**
     * Show the form for editing the specified ProductStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            Flash::error('Product Stock not found');

            return redirect(route('admin.product_stocks.index'));
        }

        return view('admin.product_stocks.edit')->with('productStock', $productStock);
    }

    /**
     * Update the specified ProductStock in storage.
     *
     * @param int $id
     * @param UpdateProductStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductStockRequest $request)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            Flash::error('Product Stock not found');

            return redirect(route('admin.product_stocks.index'));
        }

        $productStock->fill($request->all());
        $productStock->save();

        Flash::success('Product Stock updated successfully.');

        return redirect(route('admin.product_stocks.index'));
    }

    /**
     * Remove the specified ProductStock from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductStock $productStock */
        $productStock = ProductStock::find($id);

        if (empty($productStock)) {
            Flash::error('Product Stock not found');

            return redirect(route('admin.product_stocks.index'));
        }

        $productStock->delete();

        Flash::success('Product Stock deleted successfully.');

        return redirect(route('admin.product_stocks.index'));
    }
}
