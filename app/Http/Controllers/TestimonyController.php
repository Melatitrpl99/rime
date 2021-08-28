<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;
use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;

/**
 * Class TestimonyController
 * @package App\Http\Controllers
 */
class TestimonyController extends Controller
{
    /**
     * Display a listing of the Testimony.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $testimonies = Testimony::paginate(15);

        return view('admin.testimonies.index')
            ->with('testimonies', $testimonies);
    }

    /**
     * Show the form for creating a new Testimony.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.testimonies.create');
    }

    /**
     * Store a newly created Testimony in storage.
     *
     * @param \App\Http\Requests\StoreTestimonyRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreTestimonyRequest $request)
    {
        Testimony::create($request->validated());

        flash('Testimony saved successfully.', 'success');

        return redirect()->route('admin.testimonies.index');
    }

    /**
     * Display the specified Testimony.
     *
     * @param \App\Models\Testimony $testimony
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Testimony $testimony)
    {
        return view('admin.testimonies.show')
            ->with('testimony', $testimony);
    }

    /**
     * Show the form for editing the specified Testimony.
     *
     * @param \App\Models\Testimony $testimony
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Testimony $testimony)
    {
        return view('admin.testimonies.edit')
            ->with('testimony', $testimony);
    }

    /**
     * Update the specified Testimony in storage.
     *
     * @param \App\Models\Testimony $testimony
     * @param \App\Http\Requests\UpdateTestimonyRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Testimony $testimony, UpdateTestimonyRequest $request)
    {
        $testimony->update($request->validated());

        flash('Testimony updated successfully.', 'success');

        return redirect()->route('admin.testimonies.index');
    }

    /**
     * Remove the specified Testimony from storage.
     *
     * @param \App\Models\Testimony $testimony
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Testimony $testimony)
    {
        $testimony->delete();

        flash('Testimony deleted successfully.', 'success');

        return redirect()->route('admin.testimonies.index');
    }
}
