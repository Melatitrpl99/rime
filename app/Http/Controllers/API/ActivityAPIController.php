<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActivityAPIRequest;
use App\Http\Requests\API\UpdateActivityAPIRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use Response;

/**
 * Class ActivityController
 * @package App\Http\Controllers\API
 */

class ActivityAPIController extends Controller
{
    /**
     * Display a listing of the Activity.
     * GET|HEAD /activities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $activities = $query->get();

        return response()->json(ActivityResource::collection($activities));
    }

    /**
     * Store a newly created Activity in storage.
     * POST /activities
     *
     * @param CreateActivityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityAPIRequest $request)
    {
        $input = $request->validated();

        $activity = Activity::create($input);

        return response()->json(new ActivityResource($activity));
    }

    /**
     * Display the specified Activity.
     * GET|HEAD /activities/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Activity $activity)
    {
        if (!$activity) {
            return response()->json([
                'error' => 'Activity not found'
            ], 404);
        }

        return response()->json(new ActivityResource($activity));
    }

    /**
     * Update the specified Activity in storage.
     * PUT/PATCH /activities/{id}
     *
     * @param int $id
     * @param UpdateActivityAPIRequest $request
     *
     * @return Response
     */
    public function update(UpdateActivityAPIRequest $request, Activity $activity)
    {
        if (!$activity) {
            return response()->json([
                'error' => 'Activity not found'
            ], 404);
        }

        $activity->update($request->validated());

        return response()->json(new ActivityResource($activity));
    }

    /**
     * Remove the specified Activity from storage.
     * DELETE /activities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Activity $activity)
    {
        if (!$activity) {
            return response()->json([
                'error' => 'Activity not found'
            ], 404);
        }

        $activity->delete();

        return response()->json('Activity deleted successfully');
    }
}
