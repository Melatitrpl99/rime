<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDimensionRequest;
use App\Http\Requests\UpdateDimensionRequest;
use App\Http\Controllers\Controller;
use App\Models\Dimension;
use Illuminate\Http\Request;
use Flash;
use Response;

class DimensionController extends Controller
{
    /**
     * Display a listing of the Dimension.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Dimension $dimensions */
        $dimensions = Dimension::all();

        return view('admin.dimensions.index')
            ->with('dimensions', $dimensions);
    }

    /**
     * Show the form for creating a new Dimension.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.dimensions.create');
    }

    /**
     * Store a newly created Dimension in storage.
     *
     * @param CreateDimensionRequest $request
     *
     * @return Response
     */
    public function store(CreateDimensionRequest $request)
    {
        $input = $request->all();

        /** @var Dimension $dimension */
        $dimension = Dimension::create($input);

        Flash::success('Product Dimension saved successfully.');

        return redirect(route('admin.dimensions.index'));
    }

    /**
     * Display the specified Dimension.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.dimensions.index'));
        }

        return view('admin.dimensions.show')->with('dimension', $dimension);
    }

    /**
     * Show the form for editing the specified Dimension.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.dimensions.index'));
        }

        return view('admin.dimensions.edit')->with('dimension', $dimension);
    }

    /**
     * Update the specified Dimension in storage.
     *
     * @param int $id
     * @param UpdateDimensionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDimensionRequest $request)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.dimensions.index'));
        }

        $dimension->fill($request->all());
        $dimension->save();

        Flash::success('Product Dimension updated successfully.');

        return redirect(route('admin.dimensions.index'));
    }

    /**
     * Remove the specified Dimension from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dimension $dimension */
        $dimension = Dimension::find($id);

        if (empty($dimension)) {
            Flash::error('Product Dimension not found');

            return redirect(route('admin.dimensions.index'));
        }

        $dimension->delete();

        Flash::success('Product Dimension deleted successfully.');

        return redirect(route('admin.dimensions.index'));
    }
}
