<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDimensionRequest;
use App\Http\Requests\UpdateDimensionRequest;
use App\Http\Controllers\Controller;
use App\Models\Dimension;
use Illuminate\Http\Request;

/**
 * Class DimensionController
 * @package App\Http\Controllers
 */
class DimensionController extends Controller
{
    /**
     * Display a listing of the Dimension.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $dimensions = Dimension::paginate(15);

        return view('admin.dimensions.index')
            ->with('dimensions', $dimensions);
    }

    /**
     * Show the form for creating a new Dimension.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.dimensions.create');
    }

    /**
     * Store a newly created Dimension in storage.
     *
     * @param \App\Http\Requests\CreateDimensionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateDimensionRequest $request)
    {
        Dimension::create($request->validated());

        flash('Dimension saved successfully.', 'success');

        return redirect()->route('admin.dimensions.index');
    }

    /**
     * Display the specified Dimension.
     *
     * @param \App\Models\Dimension $dimension
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Dimension $dimension)
    {
        return view('admin.dimensions.show')
            ->with('dimension', $dimension);
    }

    /**
     * Show the form for editing the specified Dimension.
     *
     * @param \App\Models\Dimension $dimension
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Dimension $dimension)
    {
        return view('admin.dimensions.edit')
            ->with('dimension', $dimension);
    }

    /**
     * Update the specified Dimension in storage.
     *
     * @param \App\Models\Dimension $dimension
     * @param \App\Http\Requests\UpdateDimensionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Dimension $dimension, UpdateDimensionRequest $request)
    {
        $dimension->update($request->validated());

        flash('Dimension updated successfully.', 'success');

        return redirect()->route('admin.dimensions.index');
    }

    /**
     * Remove the specified Dimension from storage.
     *
     * @param \App\Models\Dimension $dimension
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Dimension $dimension)
    {
        $dimension->delete();

        flash('Dimension deleted successfully.', 'success');

        return redirect()->route('admin.dimensions.index');
    }
}
