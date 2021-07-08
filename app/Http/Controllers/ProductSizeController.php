<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the ProductSize.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ProductSize $productSizes */
        $productSizes = ProductSize::all();

        return view('admin.product_sizes.index')
            ->with('productSizes', $productSizes);
    }

    /**
     * Show the form for creating a new ProductSize.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product_sizes.create');
    }

    /**
     * Store a newly created ProductSize in storage.
     *
     * @param CreateProductSizeRequest $request
     *
     * @return Response
     */
    public function store(CreateProductSizeRequest $request)
    {
        $input = $request->all();

        /** @var ProductSize $productSize */
        $productSize = ProductSize::create($input);

        Flash::success('Product Size saved successfully.');

        return redirect(route('admin.productSizes.index'));
    }

    /**
     * Display the specified ProductSize.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.productSizes.index'));
        }

        return view('admin.product_sizes.show')->with('productSize', $productSize);
    }

    /**
     * Show the form for editing the specified ProductSize.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.productSizes.index'));
        }

        return view('admin.product_sizes.edit')->with('productSize', $productSize);
    }

    /**
     * Update the specified ProductSize in storage.
     *
     * @param int $id
     * @param UpdateProductSizeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductSizeRequest $request)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.productSizes.index'));
        }

        $productSize->fill($request->all());
        $productSize->save();

        Flash::success('Product Size updated successfully.');

        return redirect(route('admin.productSizes.index'));
    }

    /**
     * Remove the specified ProductSize from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductSize $productSize */
        $productSize = ProductSize::find($id);

        if (empty($productSize)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.productSizes.index'));
        }

        $productSize->delete();

        Flash::success('Product Size deleted successfully.');

        return redirect(route('admin.productSizes.index'));
    }
}
