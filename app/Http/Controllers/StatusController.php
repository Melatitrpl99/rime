<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

/**
 * Class StatusController
 * @package App\Http\Controllers
 */
class StatusController extends Controller
{
    /**
     * Display a listing of the Status.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $statuses = Status::all();

        return view('admin.statuses.index')
            ->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new Status.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.statuses.create');
    }

    /**
     * Store a newly created Status in storage.
     *
     * @param \App\Http\Requests\CreateStatusRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateStatusRequest $request)
    {
        $status = Status::create($request->validated());

        flash('Status saved successfully.', 'success');

        return redirect()->route('admin.statuses.index');
    }

    /**
     * Display the specified Status.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $status = Status::find($id);

        if (empty($status)) {
            flash('Status not found', 'error');

            return redirect()->route('admin.statuses.index');
        }

        return view('admin.statuses.show')
            ->with('status', $status);
    }

    /**
     * Show the form for editing the specified Status.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $status = Status::find($id);
        if (empty($status)) {
            flash('Status not found', 'error');

            return redirect()->route('admin.statuses.index');
        }

        return view('admin.statuses.edit')
            ->with('status', $status);
    }

    /**
     * Update the specified Status in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateStatusRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateStatusRequest $request)
    {
        $status = Status::find($id);

        if (empty($status)) {
            flash('Status not found', 'error');

            return redirect()->route('admin.statuses.index');
        }

        $status->update($request->validated());

        flash('Status updated successfully.', 'success');

        return redirect()->route('admin.statuses.index');
    }

    /**
     * Remove the specified Status from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $status = Status::find($id);

        if (empty($status)) {
            flash('Status not found', 'error');

            return redirect()->route('admin.statuses.index');
        }

        $status->delete();

        flash('Status deleted successfully.', 'success');

        return redirect()->route('admin.statuses.index');
    }
}