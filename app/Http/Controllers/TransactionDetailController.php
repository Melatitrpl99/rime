<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionDetailRequest;
use App\Http\Requests\UpdateTransactionDetailRequest;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Flash;
use Response;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the TransactionDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var TransactionDetail $transactionDetails */
        $transactionDetails = TransactionDetail::all();

        return view('admin.transaction_details.index')
            ->with('transactionDetails', $transactionDetails);
    }

    /**
     * Show the form for creating a new TransactionDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.transaction_details.create');
    }

    /**
     * Store a newly created TransactionDetail in storage.
     *
     * @param CreateTransactionDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionDetailRequest $request)
    {
        $input = $request->all();

        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = TransactionDetail::create($input);

        Flash::success('Transaction Detail saved successfully.');

        return redirect(route('admin.transactionDetails.index'));
    }

    /**
     * Display the specified TransactionDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = TransactionDetail::find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('admin.transactionDetails.index'));
        }

        return view('admin.transaction_details.show')->with('transactionDetail', $transactionDetail);
    }

    /**
     * Show the form for editing the specified TransactionDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = TransactionDetail::find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('admin.transactionDetails.index'));
        }

        return view('admin.transaction_details.edit')->with('transactionDetail', $transactionDetail);
    }

    /**
     * Update the specified TransactionDetail in storage.
     *
     * @param int $id
     * @param UpdateTransactionDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionDetailRequest $request)
    {
        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = TransactionDetail::find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('admin.transactionDetails.index'));
        }

        $transactionDetail->fill($request->all());
        $transactionDetail->save();

        Flash::success('Transaction Detail updated successfully.');

        return redirect(route('admin.transactionDetails.index'));
    }

    /**
     * Remove the specified TransactionDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = TransactionDetail::find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('admin.transactionDetails.index'));
        }

        $transactionDetail->delete();

        Flash::success('Transaction Detail deleted successfully.');

        return redirect(route('admin.transactionDetails.index'));
    }
}
