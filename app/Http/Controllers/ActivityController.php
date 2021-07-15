<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the Activity.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('admin.activities.index')
            ->with('activities', Activity::paginate());
    }

    /**
     * Show the form for creating a new Activity.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created Activity in storage.
     *
     * @param \App\Http\Requests\CreateActivityRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityRequest $request)
    {
        Activity::create($request->validated());

        flash('Activity saved successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }

    /**
     * Display the specified Activity.
     *
     * @param \App\Models\Activity $activity
     *
     * @return Response
     */
    public function show(Activity $activity)
    {
        if (empty($activity)) {
            flash('Activity not found.', 'error');

            return redirect()->route('admin.activities.index');
        }

        return view('admin.activities.show')->with('activity', $activity);
    }

    /**
     * Show the form for editing the specified Activity.
     *
     * @param \App\Models\Activity $activity
     *
     * @return Response
     */
    public function edit(Activity $activity)
    {
        if (empty($activity)) {
            flash('Activity not found.', 'error');

            return redirect()->route('admin.activities.index');
        }

        return view('admin.activities.edit')->with('activity', $activity);
    }

    /**
     * Update the specified Activity in storage.
     *
     * @param \App\Models\Activity $activity
     * @param \App\Http\Requests\UpdateActivityRequest $request
     *
     * @return Response
     */
    public function update(Activity $activity, UpdateActivityRequest $request)
    {
        if (empty($activity)) {
            flash('Activity not found.', 'error');

            return redirect()->route('admin.activities.index');
        }

        $activity->update($request->validated());

        flash('Activity updated successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }

    /**
     * Remove the specified Activity from storage.
     *
     * @param \App\Models\Activity $activity
     *
     * @return Response
     */
    public function destroy(Activity $activity)
    {
        if (empty($activity)) {
            flash('Activity not found.', 'error');

            return redirect()->route('admin.activities.index');
        }

        $activity->delete();

        flash('Activity deleted successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }
}
