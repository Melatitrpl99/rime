<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreUserShipmentAPIRequest;
use App\Http\Requests\API\UpdateUserShipmentAPIRequest;
use App\Http\Resources\UserShipmentResource;
use App\Models\UserShipment;
use DB;
use Illuminate\Http\Request;
use Log;

/**
 * Class UserShipmentAPIController.
 */
class UserShipmentAPIController extends Controller
{
    /**
     * Display a listing of the UserShipment.
     * GET|HEAD /UserShipments.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = UserShipment::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        $UserShipments = $query->where('user_id', auth()->id())->get();

        return response()->json(UserShipmentResource::collection($UserShipments), 200);
    }

    /**
     * Store a newly created UserShipment in storage.
     * POST /UserShipments.
     *
     * @param \App\Http\Requests\StoreUserShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreUserShipmentAPIRequest $request)
    {
        $UserShipment = UserShipment::create($request->validated());

        return response()->json(new UserShipmentResource($UserShipment), 201);
    }

    /**
     * Display the specified UserShipment.
     * GET|HEAD /UserShipments/{UserShipment}.
     *
     * @param \App\Models\UserShipment $UserShipment
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(UserShipment $UserShipment)
    {
        return $UserShipment->user_id == auth()->id()
            ? response()->json(new UserShipmentResource($UserShipment), 200)
            : response()->json(['message' => 'Not allowed'], 403);
    }

    /**
     * Update the specified UserShipment in storage.
     * PUT/PATCH /UserShipments/{UserShipment}.
     *
     * @param \App\Models\UserShipment $UserShipment
     * @param \App\Http\Requests\UpdateUserShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(UserShipment $UserShipment, UpdateUserShipmentAPIRequest $request)
    {
        Log::debug($request->validated());
        if ($UserShipment->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $query = UserShipment::where('user_id', auth()->id())
            ->where('is_default', true);

        $exist = $query->exists();

        if ($exist) {
            $old = $query->first();
            $old->update(['is_default' => false]);
        }
        DB::enableQueryLog();
        $UserShipment->update($request->validated());

        Log::debug(DB::getQueryLog());
        return response()->json(new UserShipmentResource($UserShipment), 200);
    }

    /**
     * Remove the specified UserShipment from storage.
     * DELETE /UserShipments/{UserShipment}.
     *
     * @param \App\Models\UserShipment $UserShipment
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(UserShipment $UserShipment)
    {
        if ($UserShipment->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $UserShipment->delete();

        return response()->json(null, 204);
    }
}
