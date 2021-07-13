<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the Shipment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Shipment $shipments */
        $shipments = Shipment::all();

        return view('admin.shipments.index')
            ->with('shipments', $shipments);
    }

    /**
     * Show the form for creating a new Shipment.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.shipments.create');
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

        /** @var Shipment $shipment */
        $shipment = Shipment::create($input);

        Flash::success('Shipment saved successfully.');

        return redirect(route('admin.shipments.index'));
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
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('admin.shipments.index'));
        }

        return view('admin.shipments.show')->with('shipment', $shipment);
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
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('admin.shipments.index'));
        }

        return view('admin.shipments.edit')->with('shipment', $shipment);
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
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('admin.shipments.index'));
        }

        $shipment->fill($request->all());
        $shipment->save();

        Flash::success('Shipment updated successfully.');

        return redirect(route('admin.shipments.index'));
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
        /** @var Shipment $shipment */
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            Flash::error('Shipment not found');

            return redirect(route('admin.shipments.index'));
        }

        $shipment->delete();

        Flash::success('Shipment deleted successfully.');

        return redirect(route('admin.shipments.index'));
    }
}
