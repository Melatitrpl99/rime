<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpendingDetailRequest;
use App\Http\Requests\UpdateSpendingDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\SpendingDetail;
use Illuminate\Http\Request;

/**
 * Class SpendingDetailController
 * @package App\Http\Controllers
 */
class SpendingDetailController extends Controller
{
    /**
     * Display a listing of the SpendingDetail.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $spendingDetails = SpendingDetail::paginate(15);

        return view('admin.spending_details.index')
            ->with('spendingDetails', $spendingDetails);
    }

    /**
     * Show the form for creating a new SpendingDetail.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.spending_details.create');
    }

    /**
     * Store a newly created SpendingDetail in storage.
     *
     * @param \App\Http\Requests\CreateSpendingDetailRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateSpendingDetailRequest $request)
    {
        $spendingDetail = SpendingDetail::create($request->validated());

        flash('Spending Detail saved successfully.', 'success');

        return redirect()->route('admin.spending_details.index');
    }

    /**
     * Display the specified SpendingDetail.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            flash('Spending Detail not found', 'error');

            return redirect()->route('admin.spending_details.index');
        }

        return view('admin.spending_details.show')
            ->with('spendingDetail', $spendingDetail);
    }

    /**
     * Show the form for editing the specified SpendingDetail.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $spendingDetail = SpendingDetail::find($id);
        if (empty($spendingDetail)) {
            flash('Spending Detail not found', 'error');

            return redirect()->route('admin.spending_details.index');
        }

        return view('admin.spending_details.edit')
            ->with('spendingDetail', $spendingDetail);
    }

    /**
     * Update the specified SpendingDetail in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateSpendingDetailRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateSpendingDetailRequest $request)
    {
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            flash('Spending Detail not found', 'error');

            return redirect()->route('admin.spending_details.index');
        }

        $spendingDetail->update($request->validated());

        flash('Spending Detail updated successfully.', 'success');

        return redirect()->route('admin.spending_details.index');
    }

    /**
     * Remove the specified SpendingDetail from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            flash('Spending Detail not found', 'error');

            return redirect()->route('admin.spending_details.index');
        }

        $spendingDetail->delete();

        flash('Spending Detail deleted successfully.', 'success');

        return redirect()->route('admin.spending_details.index');
    }
}