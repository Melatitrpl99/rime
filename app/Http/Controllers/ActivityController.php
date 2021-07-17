<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

/**
 * Class ActivityController
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * Display a listing of the Activity.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $activities = Activity::paginate(15);

        return view('admin.activities.index')
            ->with('activities', $activities);
    }

    /**
     * Show the form for creating a new Activity.
     *
     * @return \Illuminate\Support\Facades\View
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
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateActivityRequest $request)
    {
        $activity = Activity::create($request->validated());

        flash('Activity saved successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }

    /**
     * Display the specified Activity.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $activity = Activity::find($id);

        if (empty($activity)) {
            flash('Activity not found', 'error');

            return redirect()->route('admin.activities.index');
        }

        return view('admin.activities.show')
            ->with('activity', $activity);
    }

    /**
     * Show the form for editing the specified Activity.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        if (empty($activity)) {
            flash('Activity not found', 'error');

            return redirect()->route('admin.activities.index');
        }

        return view('admin.activities.edit')
            ->with('activity', $activity);
    }

    /**
     * Update the specified Activity in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateActivityRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateActivityRequest $request)
    {
        $activity = Activity::find($id);

        if (empty($activity)) {
            flash('Activity not found', 'error');

            return redirect()->route('admin.activities.index');
        }

        $activity->update($request->validated());

        flash('Activity updated successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }

    /**
     * Remove the specified Activity from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);

        if (empty($activity)) {
            flash('Activity not found', 'error');

            return redirect()->route('admin.activities.index');
        }

        $activity->delete();

        flash('Activity deleted successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }
}