<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryCostRequest;
use App\Http\Requests\UpdateDeliveryCostRequest;
use App\Http\Controllers\Controller;
use App\Models\DeliveryCost;
use Illuminate\Http\Request;

/**
 * Class DeliveryCostController
 * @package App\Http\Controllers
 */
class DeliveryCostController extends Controller
{
    /**
     * Display a listing of the DeliveryCost.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $deliveryCosts = DeliveryCost::all();

        return view('admin.delivery_costs.index')
            ->with('deliveryCosts', $deliveryCosts);
    }

    /**
     * Show the form for creating a new DeliveryCost.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.delivery_costs.create');
    }

    /**
     * Store a newly created DeliveryCost in storage.
     *
     * @param \App\Http\Requests\StoreDeliveryCostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreDeliveryCostRequest $request)
    {
        DeliveryCost::create($request->validated());

        flash('Delivery Cost saved successfully.', 'success');

        return redirect()->route('admin.delivery_costs.index');
    }

    /**
     * Display the specified DeliveryCost.
     *
     * @param \App\Models\DeliveryCost $deliveryCost
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(DeliveryCost $deliveryCost)
    {
        return view('admin.delivery_costs.show')
            ->with('deliveryCost', $deliveryCost);
    }

    /**
     * Show the form for editing the specified DeliveryCost.
     *
     * @param \App\Models\DeliveryCost $deliveryCost
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(DeliveryCost $deliveryCost)
    {
        return view('admin.delivery_costs.edit')
            ->with('deliveryCost', $deliveryCost);
    }

    /**
     * Update the specified DeliveryCost in storage.
     *
     * @param \App\Models\DeliveryCost $deliveryCost
     * @param \App\Http\Requests\UpdateDeliveryCostRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(DeliveryCost $deliveryCost, UpdateDeliveryCostRequest $request)
    {
        $deliveryCost->update($request->validated());

        flash('Delivery Cost updated successfully.', 'success');

        return redirect()->route('admin.delivery_costs.index');
    }

    /**
     * Remove the specified DeliveryCost from storage.
     *
     * @param \App\Models\DeliveryCost $deliveryCost
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(DeliveryCost $deliveryCost)
    {
        $deliveryCost->delete();

        flash('Delivery Cost deleted successfully.', 'success');

        return redirect()->route('admin.delivery_costs.index');
    }
}
