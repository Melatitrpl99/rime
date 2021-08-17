<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShipmentAPIRequest;
use App\Http\Requests\API\UpdateShipmentAPIRequest;
use App\Http\Resources\ShipmentResource;
use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

/**
 * Class ShipmentAPIController
 * @package App\Http\Controllers\API
 */
class ShipmentAPIController extends Controller
{
    /**
     * Display a listing of the Shipment.
     * GET|HEAD /shipments
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Shipment::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        $shipments = $query->where('user_id', auth()->id())->get();

        return response()->json(ShipmentResource::collection($shipments), 200);
    }

    /**
     * Store a newly created Shipment in storage.
     * POST /shipments
     *
     * @param \App\Http\Requests\CreateShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateShipmentAPIRequest $request)
    {
        $shipment = Shipment::create($request->validated());

        return response()->json(new ShipmentResource($shipment), 201);
    }

    /**
     * Display the specified Shipment.
     * GET|HEAD /shipments/{shipment}
     *
     * @param \App\Models\Shipment $shipment
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Shipment $shipment)
    {
        return $shipment->user_id == auth()->id()
            ? response()->json(new ShipmentResource($shipment), 200)
            : response()->json(['message' => 'Not allowed'], 403);
    }

    /**
     * Update the specified Shipment in storage.
     * PUT/PATCH /shipments/{shipment}
     *
     * @param \App\Models\Shipment $shipment
     * @param \App\Http\Requests\UpdateShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Shipment $shipment, UpdateShipmentAPIRequest $request)
    {
        if ($shipment->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

        $shipment->update($request->validated());

        return response()->json(new ShipmentResource($shipment), 200);
    }

    /**
     * Remove the specified Shipment from storage.
     * DELETE /shipments/{shipment}
     *
     * @param \App\Models\Shipment $shipment
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Shipment $shipment)
    {
        if ($shipment->user_id != auth()->id())
            return response()->json(['message' => 'Not allowed'], 403);

        $shipment->delete();

        return response()->json(null, 204);
    }
}
