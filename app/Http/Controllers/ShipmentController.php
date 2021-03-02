<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Repositories\ShipmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShipmentController extends AppBaseController
{
    /** @var  ShipmentRepository */
    private $shipmentRepository;

    public function __construct(ShipmentRepository $shipmentRepo)
    {
        $this->shipmentRepository = $shipmentRepo;
    }

    /**
     * Display a listing of the Shipment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shipments = $this->shipmentRepository->all();

        return view('shipments.index')
            ->with('shipments', $shipments);
    }

    /**
     * Show the form for creating a new Shipment.
     *
     * @return Response
     */
    public function create()
    {
        return view('shipments.create');
    }

    /**
     * Store a newly created Shipment in storage.
     *
     * @param CreateShipmentRequest $request
     *
     * @return Response
     */
    public function store(CreateShipmentRequest $request)
    {
        $input = $request->all();

        $shipment = $this->shipmentRepository->create($input);

        Flash::success('Shipment saved successfully.');

        return redirect(route('shipments.index'));
    }

    /**
     * Display the specified Shipment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shipment = $this->shipmentRepository->find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('shipments.index'));
        }

        return view('shipments.show')->with('shipment', $shipment);
    }

    /**
     * Show the form for editing the specified Shipment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shipment = $this->shipmentRepository->find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('shipments.index'));
        }

        return view('shipments.edit')->with('shipment', $shipment);
    }

    /**
     * Update the specified Shipment in storage.
     *
     * @param int $id
     * @param UpdateShipmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShipmentRequest $request)
    {
        $shipment = $this->shipmentRepository->find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('shipments.index'));
        }

        $shipment = $this->shipmentRepository->update($request->all(), $id);

        Flash::success('Shipment updated successfully.');

        return redirect(route('shipments.index'));
    }

    /**
     * Remove the specified Shipment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shipment = $this->shipmentRepository->find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('shipments.index'));
        }

        $this->shipmentRepository->delete($id);

        Flash::success('Shipment deleted successfully.');

        return redirect(route('shipments.index'));
    }
}
