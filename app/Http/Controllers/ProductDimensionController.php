<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductDimensionRequest;
use App\Http\Requests\UpdateProductDimensionRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductDimension;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductDimensionController extends Controller
{
    /**
     * Display a listing of the ProductDimension.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ProductDimension $productDimensions */
        $productDimensions = ProductDimension::all();

        return view('admin.product_dimensions.index')
            ->with('productDimensions', $productDimensions);
    }

    /**
     * Show the form for creating a new ProductDimension.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product_dimensions.create');
    }

    /**
     * Store a newly created ProductDimension in storage.
     *
     * @param CreateProductDimensionRequest $request
     *
     * @return Response
     */
    public function store(CreateProductDimensionRequest $request)
    {
        $input = $request->all();

        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::create($input);

        Flash::success('Product Dimension saved successfully.');

        return redirect(route('admin.productDimensions.index'));
    }

    /**
     * Display the specified ProductDimension.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.productDimensions.index'));
        }

        return view('admin.product_dimensions.show')->with('productDimension', $productDimension);
    }

    /**
     * Show the form for editing the specified ProductDimension.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.productDimensions.index'));
        }

        return view('admin.product_dimensions.edit')->with('productDimension', $productDimension);
    }

    /**
     * Update the specified ProductDimension in storage.
     *
     * @param int $id
     * @param UpdateProductDimensionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductDimensionRequest $request)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.productDimensions.index'));
        }

        $productDimension->fill($request->all());
        $productDimension->save();

        Flash::success('Product Dimension updated successfully.');

        return redirect(route('admin.productDimensions.index'));
    }

    /**
     * Remove the specified ProductDimension from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductDimension $productDimension */
        $productDimension = ProductDimension::find($id);

        if (empty($productDimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.productDimensions.index'));
        }

        $productDimension->delete();

        Flash::success('Product Dimension deleted successfully.');

        return redirect(route('admin.productDimensions.index'));
    }
}
