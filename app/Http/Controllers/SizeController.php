<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Flash;
use Response;

class SizeController extends Controller
{
    /**
     * Display a listing of the Size.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Size $sizes */
        $sizes = Size::all();

        return view('admin.sizes.index')
            ->with('sizes', $sizes);
    }

    /**
     * Show the form for creating a new Size.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created Size in storage.
     *
     * @param CreateSizeRequest $request
     *
     * @return Response
     */
    public function store(CreateSizeRequest $request)
    {
        $input = $request->all();

        /** @var Size $size */
        $size = Size::create($input);

        Flash::success('Product Size saved successfully.');

        return redirect(route('admin.sizes.index'));
    }

    /**
     * Display the specified Size.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.sizes.index'));
        }

        return view('admin.sizes.show')->with('size', $size);
    }

    /**
     * Show the form for editing the specified Size.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.sizes.index'));
        }

        return view('admin.sizes.edit')->with('size', $size);
    }

    /**
     * Update the specified Size in storage.
     *
     * @param int $id
     * @param UpdateSizeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSizeRequest $request)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.sizes.index'));
        }

        $size->fill($request->all());
        $size->save();

        Flash::success('Product Size updated successfully.');

        return redirect(route('admin.sizes.index'));
    }

    /**
     * Remove the specified Size from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Size $size */
        $size = Size::find($id);

        if (empty($size)) {
            Flash::error('Product Size not found');

            return redirect(route('admin.sizes.index'));
        }

        $size->delete();

        Flash::success('Product Size deleted successfully.');

        return redirect(route('admin.sizes.index'));
    }
}
