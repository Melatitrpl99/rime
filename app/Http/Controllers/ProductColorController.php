<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductColorRequest;
use App\Http\Requests\UpdateProductColorRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the ProductColor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var ProductColor $productColors */
        $productColors = ProductColor::all();

        return view('admin.product_colors.index')
            ->with('productColors', $productColors);
    }

    /**
     * Show the form for creating a new ProductColor.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product_colors.create');
    }

    /**
     * Store a newly created ProductColor in storage.
     *
     * @param CreateProductColorRequest $request
     *
     * @return Response
     */
    public function store(CreateProductColorRequest $request)
    {
        $input = $request->all();

        /** @var ProductColor $productColor */
        $productColor = ProductColor::create($input);

        Flash::success('Product Color saved successfully.');

        return redirect(route('admin.productColors.index'));
    }

    /**
     * Display the specified ProductColor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.productColors.index'));
        }

        return view('admin.product_colors.show')->with('productColor', $productColor);
    }

    /**
     * Show the form for editing the specified ProductColor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.productColors.index'));
        }

        return view('admin.product_colors.edit')->with('productColor', $productColor);
    }

    /**
     * Update the specified ProductColor in storage.
     *
     * @param int $id
     * @param UpdateProductColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductColorRequest $request)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.productColors.index'));
        }

        $productColor->fill($request->all());
        $productColor->save();

        Flash::success('Product Color updated successfully.');

        return redirect(route('admin.productColors.index'));
    }

    /**
     * Remove the specified ProductColor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProductColor $productColor */
        $productColor = ProductColor::find($id);

        if (empty($productColor)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.productColors.index'));
        }

        $productColor->delete();

        Flash::success('Product Color deleted successfully.');

        return redirect(route('admin.productColors.index'));
    }
}
