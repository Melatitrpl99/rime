<?php

namespace App\Http\Controllers;

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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(Request $request)
    {
        Activity::create($request->all());

        flash('Activity saved successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }

    /**
     * Display the specified Activity.
     *
     * @param \App\Models\Activity $activity
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Activity $activity)
    {
        return view('admin.activities.show')
            ->with('activity', $activity);
    }

    /**
     * Show the form for editing the specified Activity.
     *
     * @param \App\Models\Activity $activity
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit')
            ->with('activity', $activity);
    }

    /**
     * Update the specified Activity in storage.
     *
     * @param \App\Models\Activity $activity
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Activity $activity, Request $request)
    {
        $activity->update($request->all());

        flash('Activity updated successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }

    /**
     * Remove the specified Activity from storage.
     *
     * @param \App\Models\Activity $activity
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        flash('Activity deleted successfully.', 'success');

        return redirect()->route('admin.activities.index');
    }
}
