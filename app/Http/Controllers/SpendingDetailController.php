<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpendingDetailRequest;
use App\Http\Requests\UpdateSpendingDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\SpendingDetail;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpendingDetailController extends Controller
{
    /**
     * Display a listing of the SpendingDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SpendingDetail $spendingDetails */
        $spendingDetails = SpendingDetail::all();

        return view('admin.spending_details.index')
            ->with('spendingDetails', $spendingDetails);
    }

    /**
     * Show the form for creating a new SpendingDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.spending_details.create');
    }

    /**
     * Store a newly created SpendingDetail in storage.
     *
     * @param CreateSpendingDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateSpendingDetailRequest $request)
    {
        $input = $request->all();

        /** @var SpendingDetail $spendingDetail */
        $spendingDetail = SpendingDetail::create($input);

        Flash::success('Spending Detail saved successfully.');

        return redirect(route('admin.spendingDetails.index'));
    }

    /**
     * Display the specified SpendingDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SpendingDetail $spendingDetail */
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            Flash::error('Spending Detail not found');

            return redirect(route('admin.spendingDetails.index'));
        }

        return view('admin.spending_details.show')->with('spendingDetail', $spendingDetail);
    }

    /**
     * Show the form for editing the specified SpendingDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SpendingDetail $spendingDetail */
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            Flash::error('Spending Detail not found');

            return redirect(route('admin.spendingDetails.index'));
        }

        return view('admin.spending_details.edit')->with('spendingDetail', $spendingDetail);
    }

    /**
     * Update the specified SpendingDetail in storage.
     *
     * @param int $id
     * @param UpdateSpendingDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpendingDetailRequest $request)
    {
        /** @var SpendingDetail $spendingDetail */
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            Flash::error('Spending Detail not found');

            return redirect(route('admin.spendingDetails.index'));
        }

        $spendingDetail->fill($request->all());
        $spendingDetail->save();

        Flash::success('Spending Detail updated successfully.');

        return redirect(route('admin.spendingDetails.index'));
    }

    /**
     * Remove the specified SpendingDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SpendingDetail $spendingDetail */
        $spendingDetail = SpendingDetail::find($id);

        if (empty($spendingDetail)) {
            Flash::error('Spending Detail not found');

            return redirect(route('admin.spendingDetails.index'));
        }

        $spendingDetail->delete();

        Flash::success('Spending Detail deleted successfully.');

        return redirect(route('admin.spendingDetails.index'));
    }
}
