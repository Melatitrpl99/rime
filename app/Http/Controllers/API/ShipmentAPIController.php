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

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $shipments = $query->get();

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => ShipmentResource::collection($shipments)
        ]);
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

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new ShipmentResource($shipment)
        ]);
    }

    /**
     * Display the specified Shipment.
     * GET|HEAD /shipments/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new ShipmentResource($shipment)
        ]);
    }

    /**
     * Update the specified Shipment in storage.
     * PUT/PATCH /shipments/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateShipmentAPIRequest $request)
    {
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $shipment->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new ShipmentResource($shipment)
        ]);
    }

    /**
     * Remove the specified Shipment from storage.
     * DELETE /shipments/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $shipment->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}