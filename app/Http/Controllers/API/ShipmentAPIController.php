<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShipmentAPIRequest;
use App\Http\Requests\API\UpdateShipmentAPIRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShipmentResource;
use Response;

/**
 * Class ShipmentController
 * @package App\Http\Controllers\API
 */

class ShipmentAPIController extends Controller
{
    /**
     * Display a listing of the Shipment.
     * GET|HEAD /shipments
     *
     * @param Request $request
     * @return Response
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

        return $this->sendResponse(ShipmentResource::collection($shipments), 'Shipments retrieved successfully');
    }

    /**
     * Store a newly created Shipment in storage.
     * POST /shipments
     *
     * @param CreateShipmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateShipmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Shipment $shipment */
        $shipment = Shipment::create($input);

        return $this->sendResponse(new ShipmentResource($shipment), 'Shipment saved successfully');
    }

    /**
     * Display the specified Shipment.
     * GET|HEAD /shipments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            return $this->sendError('Shipment not found');
        }

        return $this->sendResponse(new ShipmentResource($shipment), 'Shipment retrieved successfully');
    }

    /**
     * Update the specified Shipment in storage.
     * PUT/PATCH /shipments/{id}
     *
     * @param int $id
     * @param UpdateShipmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShipmentAPIRequest $request)
    {
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            return $this->sendError('Shipment not found');
        }

        $shipment->fill($request->all());
        $shipment->save();

        return $this->sendResponse(new ShipmentResource($shipment), 'Shipment updated successfully');
    }

    /**
     * Remove the specified Shipment from storage.
     * DELETE /shipments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            return $this->sendError('Shipment not found');
        }

        $shipment->delete();

        return $this->sendSuccess('Shipment deleted successfully');
    }
}
