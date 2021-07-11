<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Flash;
use Response;

class ColorController extends Controller
{
    /**
     * Display a listing of the Color.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Color $colors */
        $colors = Color::all();

        return view('admin.colors.index')
            ->with('colors', $colors);
    }

    /**
     * Show the form for creating a new Color.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created Color in storage.
     *
     * @param CreateColorRequest $request
     *
     * @return Response
     */
    public function store(CreateColorRequest $request)
    {
        $input = $request->all();

        /** @var Color $color */
        $color = Color::create($input);

        Flash::success('Product Color saved successfully.');

        return redirect(route('admin.colors.index'));
    }

    /**
     * Display the specified Color.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.colors.index'));
        }

        return view('admin.colors.show')->with('color', $color);
    }

    /**
     * Show the form for editing the specified Color.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.colors.index'));
        }

        return view('admin.colors.edit')->with('color', $color);
    }

    /**
     * Update the specified Color in storage.
     *
     * @param int $id
     * @param UpdateColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorRequest $request)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.colors.index'));
        }

        $color->fill($request->all());
        $color->save();

        Flash::success('Product Color updated successfully.');

        return redirect(route('admin.colors.index'));
    }

    /**
     * Remove the specified Color from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Color $color */
        $color = Color::find($id);

        if (empty($color)) {
            Flash::error('Product Color not found');

            return redirect(route('admin.colors.index'));
        }

        $color->delete();

        Flash::success('Product Color deleted successfully.');

        return redirect(route('admin.colors.index'));
    }
}
