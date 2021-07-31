<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

/**
 * Class SizeController
 * @package App\Http\Controllers
 */
class SizeController extends Controller
{
    /**
     * Display a listing of the Size.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $sizes = Size::paginate(15);

        return view('admin.sizes.index')
            ->with('sizes', $sizes);
    }

    /**
     * Show the form for creating a new Size.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created Size in storage.
     *
     * @param \App\Http\Requests\CreateSizeRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateSizeRequest $request)
    {
        Size::create($request->validated());

        flash('Size saved successfully.', 'success');

        return redirect()->route('admin.sizes.index');
    }

    /**
     * Display the specified Size.
     *
     * @param \App\Models\Size $size
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Size $size)
    {
        return view('admin.sizes.show')
            ->with('size', $size);
    }

    /**
     * Show the form for editing the specified Size.
     *
     * @param \App\Models\Size $size
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Size $size)
    {
        return view('admin.sizes.edit')
            ->with('size', $size);
    }

    /**
     * Update the specified Size in storage.
     *
     * @param \App\Models\Size $size
     * @param \App\Http\Requests\UpdateSizeRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Size $size, UpdateSizeRequest $request)
    {
        $size->update($request->validated());

        flash('Size updated successfully.', 'success');

        return redirect()->route('admin.sizes.index');
    }

    /**
     * Remove the specified Size from storage.
     *
     * @param \App\Models\Size $size
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();

        flash('Size deleted successfully.', 'success');

        return redirect()->route('admin.sizes.index');
    }
}
