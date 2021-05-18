<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Flash;
use Response;

class ActivityController extends Controller
{
    /**
     * Display a listing of the Activity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Activity $activities */
        $activities = Activity::all();

        return view('admin.activities.index')
            ->with('activities', $activities);
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
     * @param CreateActivityRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityRequest $request)
    {
        $input = $request->all();

        /** @var Activity $activity */
        $activity = Activity::create($input);

        Flash::success('Activity saved successfully.');

        return redirect(route('admin.activities.index'));
    }

    /**
     * Display the specified Activity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Activity $activity */
        $activity = Activity::find($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('admin.activities.index'));
        }

        return view('admin.activities.show')->with('activity', $activity);
    }

    /**
     * Show the form for editing the specified Activity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Activity $activity */
        $activity = Activity::find($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('admin.activities.index'));
        }

        return view('admin.activities.edit')->with('activity', $activity);
    }

    /**
     * Update the specified Activity in storage.
     *
     * @param int $id
     * @param UpdateActivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityRequest $request)
    {
        /** @var Activity $activity */
        $activity = Activity::find($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('admin.activities.index'));
        }

        $activity->fill($request->all());
        $activity->save();

        Flash::success('Activity updated successfully.');

        return redirect(route('admin.activities.index'));
    }

    /**
     * Remove the specified Activity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Activity $activity */
        $activity = Activity::find($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('admin.activities.index'));
        }

        $activity->delete();

        Flash::success('Activity deleted successfully.');

        return redirect(route('admin.activities.index'));
    }
}
