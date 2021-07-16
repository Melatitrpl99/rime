<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

/**
 * Class ShipmentController
 * @package App\Http\Controllers
 */
class ShipmentController extends Controller
{
    /**
     * Display a listing of the Shipment.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $shipments = Shipment::paginate(15);

        return view('admin.shipments.index')
            ->with('shipments', $shipments);
    }

    /**
     * Show the form for creating a new Shipment.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.shipments.create');
    }

    /**
     * Store a newly created Shipment in storage.
     *
     * @param \App\Http\Requests\CreateShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateShipmentRequest $request)
    {
        $shipment = Shipment::create($request->validated());

        flash('Shipment saved successfully.', 'success');

        return redirect()->route('admin.shipments.index');
    }

    /**
     * Display the specified Shipment.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            flash('Shipment not found', 'error');

            return redirect()->route('admin.shipments.index');
        }

        return view('admin.shipments.show')
            ->with('shipment', $shipment);
    }

    /**
     * Show the form for editing the specified Shipment.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $shipment = Shipment::find($id);
        if (empty($shipment)) {
            flash('Shipment not found', 'error');

            return redirect()->route('admin.shipments.index');
        }

        return view('admin.shipments.edit')
            ->with('shipment', $shipment);
    }

    /**
     * Update the specified Shipment in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateShipmentRequest $request)
    {
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            flash('Shipment not found', 'error');

            return redirect()->route('admin.shipments.index');
        }

        $shipment->update($request->validated());

        flash('Shipment updated successfully.', 'success');

        return redirect()->route('admin.shipments.index');
    }

    /**
     * Remove the specified Shipment from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::find($id);

        if (empty($shipment)) {
            flash('Shipment not found', 'error');

            return redirect()->route('admin.shipments.index');
        }

        $shipment->delete();

        flash('Shipment deleted successfully.', 'success');

        return redirect()->route('admin.shipments.index');
    }
}