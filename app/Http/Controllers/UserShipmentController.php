<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\StoreUserShipmentRequest;
use App\Http\Requests\API\UpdateUserShipmentRequest;
use App\Models\UserShipment;

/**
 * Class ShipmentController.
 */
class UserShipmentController extends Controller
{
    /**
     * Display a listing of the Shipment.
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index()
    {
        $userShipments = UserShipment::with(['village', 'user'])->paginate(15);

        return view('admin.user_shipments.index')
            ->with('userShipments', $userShipments);
    }

    /**
     * Show the form for creating a new Shipment.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.user_shipments.create');
    }

    /**
     * Store a newly created Shipment in storage.
     *
     * @param \App\Http\Requests\StoreShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreUserShipmentRequest $request)
    {
        UserShipment::create($request->validated());

        flash('Shipment saved successfully.', 'success');

        return redirect()->route('admin.user_shipments.index');
    }

    /**
     * Display the specified Shipment.
     *
     * @param \App\Models\UserShipment $userShipments
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(UserShipment $userShipment)
    {
        return view('admin.user_shipments.show')
            ->with('userShipment', $userShipment);
    }

    /**
     * Show the form for editing the specified Shipment.
     *
     * @param \App\Models\UserShipment $userShipments
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(UserShipment $userShipment)
    {
        return view('admin.user_shipments.edit')
            ->with('userShipment', $userShipment);
    }

    /**
     * Update the specified Shipment in storage.
     *
     * @param \App\Models\UserShipment $userShipments
     * @param \App\Http\Requests\UpdateUserShipmentRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(UserShipment $userShipment, UpdateUserShipmentRequest $request)
    {
        $userShipment->update($request->validated());

        flash('Shipment updated successfully.', 'success');

        return redirect()->route('admin.user_shipments.index');
    }

    /**
     * Remove the specified Shipment from storage.
     *
     * @param \App\Models\UserShipment $userShipments
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(UserShipment $userShipment)
    {
        $userShipment->delete();

        flash('Shipment deleted successfully.', 'success');

        return redirect()->route('admin.user_shipments.index');
    }
}
