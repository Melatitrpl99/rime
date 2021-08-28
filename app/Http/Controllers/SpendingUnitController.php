<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendingUnitRequest;
use App\Http\Requests\UpdateSpendingUnitRequest;
use App\Http\Controllers\Controller;
use App\Models\SpendingUnit;
use Illuminate\Http\Request;

/**
 * Class SpendingUnitController
 * @package App\Http\Controllers
 */
class SpendingUnitController extends Controller
{
    /**
     * Display a listing of the SpendingUnit.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $spendingUnits = SpendingUnit::all();

        return view('admin.spending_units.index')
            ->with('spendingUnits', $spendingUnits);
    }

    /**
     * Show the form for creating a new SpendingUnit.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.spending_units.create');
    }

    /**
     * Store a newly created SpendingUnit in storage.
     *
     * @param \App\Http\Requests\StoreSpendingUnitRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreSpendingUnitRequest $request)
    {
        SpendingUnit::create($request->validated());

        flash('Spending Unit saved successfully.', 'success');

        return redirect()->route('admin.spending_units.index');
    }

    /**
     * Display the specified SpendingUnit.
     *
     * @param \App\Models\SpendingUnit $spendingUnit
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(SpendingUnit $spendingUnit)
    {
        return view('admin.spending_units.show')
            ->with('spendingUnit', $spendingUnit);
    }

    /**
     * Show the form for editing the specified SpendingUnit.
     *
     * @param \App\Models\SpendingUnit $spendingUnit
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(SpendingUnit $spendingUnit)
    {
        return view('admin.spending_units.edit')
            ->with('spendingUnit', $spendingUnit);
    }

    /**
     * Update the specified SpendingUnit in storage.
     *
     * @param \App\Models\SpendingUnit $spendingUnit
     * @param \App\Http\Requests\UpdateSpendingUnitRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(SpendingUnit $spendingUnit, UpdateSpendingUnitRequest $request)
    {
        $spendingUnit->update($request->validated());

        flash('Spending Unit updated successfully.', 'success');

        return redirect()->route('admin.spending_units.index');
    }

    /**
     * Remove the specified SpendingUnit from storage.
     *
     * @param \App\Models\SpendingUnit $spendingUnit
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(SpendingUnit $spendingUnit)
    {
        $spendingUnit->delete();

        flash('Spending Unit deleted successfully.', 'success');

        return redirect()->route('admin.spending_units.index');
    }
}
