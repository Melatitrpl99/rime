<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class ColorController
 * @package App\Http\Controllers
 */
class ColorController extends Controller
{
    /**
     * Display a listing of the Color.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $colors = Color::all();

        return view('admin.colors.index')
            ->with('colors', $colors);
    }

    /**
     * Show the form for creating a new Color.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created Color in storage.
     *
     * @param \App\Http\Requests\CreateColorRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateColorRequest $request)
    {
        $color = Color::create($request->validated());

        flash('Color saved successfully.', 'success');

        return redirect()->route('admin.colors.index');
    }

    /**
     * Display the specified Color.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $color = Color::find($id);

        if (empty($color)) {
            flash('Color not found', 'error');

            return redirect()->route('admin.colors.index');
        }

        return view('admin.colors.show')
            ->with('color', $color);
    }

    /**
     * Show the form for editing the specified Color.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $color = Color::find($id);
        if (empty($color)) {
            flash('Color not found', 'error');

            return redirect()->route('admin.colors.index');
        }

        return view('admin.colors.edit')
            ->with('color', $color);
    }

    /**
     * Update the specified Color in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateColorRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateColorRequest $request)
    {
        $color = Color::find($id);

        if (empty($color)) {
            flash('Color not found', 'error');

            return redirect()->route('admin.colors.index');
        }

        $color->update($request->validated());

        flash('Color updated successfully.', 'success');

        return redirect()->route('admin.colors.index');
    }

    /**
     * Remove the specified Color from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);

        if (empty($color)) {
            flash('Color not found', 'error');

            return redirect()->route('admin.colors.index');
        }

        $color->delete();

        flash('Color deleted successfully.', 'success');

        return redirect()->route('admin.colors.index');
    }
}