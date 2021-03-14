<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateShipmentAPIRequest;
use App\Http\Requests\API\UpdateShipmentAPIRequest;
use App\Models\Shipment;
use App\Repositories\ShipmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ShipmentResource;
use Response;

/**
 * Class ShipmentController
 * @package App\Http\Controllers\API
 */

class ShipmentAPIController extends AppBaseController
{
    /** @var  ShipmentRepository */
    private $shipmentRepository;

    public function __construct(ShipmentRepository $shipmentRepo)
    {
        $this->shipmentRepository = $shipmentRepo;
    }

    /**
     * Display a listing of the Shipment.
     * GET|HEAD /shipments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $shipments = $this->shipmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

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

        $shipment = $this->shipmentRepository->create($input);

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
        $shipment = $this->shipmentRepository->find($id);

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
        $input = $request->all();

        /** @var Shipment $shipment */
        $shipment = $this->shipmentRepository->find($id);

        if (empty($shipment)) {
            return $this->sendError('Shipment not found');
        }

        $shipment = $this->shipmentRepository->update($input, $id);

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
        $shipment = $this->shipmentRepository->find($id);

        if (empty($shipment)) {
            return $this->sendError('Shipment not found');
        }

        $shipment->delete();

        return $this->sendSuccess('Shipment deleted successfully');
    }
}
