<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserShipmentController;
use App\Http\Requests\API\StoreUserShipmentAPIRequest;
use App\Http\Requests\API\UpdateUserShipmentAPIRequest;
use App\Http\Resources\UserShipmentResource;
use App\Models\UserShipment;
use App\Models\Village;
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

        $userShipments = $query->where('user_id', auth()->id())->get();

        return response()->json(UserShipmentResource::collection($userShipments), 200);
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
        $input = collect($request->validated());
        $input->put('user_id', auth()->id());

        $village = Village::whereRelation('district', 'name', 'LIKE', $request->district)
            ->where('name', 'LIKE', $request->village)
            ->first();

        $input->put('village_id', $village->id);

        if ($request->boolean('is_default')) {
            UserShipment::whereUserId(auth()->id())
                ->where('is_default', true)
                ->update(['is_default' => false]);
        }

        $userShipment = UserShipment::create($input->toArray());

        return response()->json(new UserShipmentResource($userShipment->load('village.district.regency.province')), 201);
    }

    /**
     * Display the specified UserShipment.
     * GET|HEAD /UserShipments/{UserShipment}.
     *
     * @param \App\Models\UserShipment $userShipment
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(UserShipment $userShipment)
    {
        return $userShipment->user_id == auth()->id()
            ? response()->json(new UserShipmentResource($userShipment->load('village.district.regency.province')), 200)
            : response()->json(['message' => 'Not allowed'], 403);
    }

    /**
     * Update the specified UserShipment in storage.
     * PUT/PATCH /UserShipments/{UserShipment}.
     *
     * @param \App\Models\UserShipment $userShipment
     * @param \App\Http\Requests\UpdateUserShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(UserShipment $userShipment, UpdateUserShipmentAPIRequest $request)
    {
        Log::debug($request->validated());
        if ($userShipment->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $input = collect($request->validated());

        $village = Village::whereRelation('district', 'name', 'LIKE', $request->district)
            ->where('name', 'LIKE', $request->village)
            ->first();

        $input->put('village_id', $village->id);

        if ($request->boolean('is_default')) {
            UserShipment::whereUserId(auth()->id())
                ->where('is_default', true)
                ->update(['is_default' => false]);
        }

        $userShipment->update($input->toArray());

        return response()->json(new UserShipmentResource($userShipment->load('village.district.regency.province')), 200);
    }

    /**
     * Remove the specified UserShipment from storage.
     * DELETE /UserShipments/{UserShipment}.
     *
     * @param \App\Models\UserShipment $userShipment
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(UserShipment $userShipment)
    {
        if ($userShipment->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $userShipment->delete();

        return response()->json(null, 204);
    }
}
