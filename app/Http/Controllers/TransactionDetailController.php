<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionDetailRequest;
use App\Http\Requests\UpdateTransactionDetailRequest;
use App\Repositories\TransactionDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TransactionDetailController extends AppBaseController
{
    /** @var  TransactionDetailRepository */
    private $transactionDetailRepository;

    public function __construct(TransactionDetailRepository $transactionDetailRepo)
    {
        $this->transactionDetailRepository = $transactionDetailRepo;
    }

    /**
     * Display a listing of the TransactionDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $transactionDetails = $this->transactionDetailRepository->all();

        return view('transaction_details.index')
            ->with('transactionDetails', $transactionDetails);
    }

    /**
     * Show the form for creating a new TransactionDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('transaction_details.create');
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

        $transactionDetail = $this->transactionDetailRepository->create($input);

        Flash::success('Transaction Detail saved successfully.');

        return redirect(route('transactionDetails.index'));
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
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('transactionDetails.index'));
        }

        return view('transaction_details.show')->with('transactionDetail', $transactionDetail);
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
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('transactionDetails.index'));
        }

        return view('transaction_details.edit')->with('transactionDetail', $transactionDetail);
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
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('transactionDetails.index'));
        }

        $transactionDetail = $this->transactionDetailRepository->update($request->all(), $id);

        Flash::success('Transaction Detail updated successfully.');

        return redirect(route('transactionDetails.index'));
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
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            Flash::error('Transaction Detail not found');

            return redirect(route('transactionDetails.index'));
        }

        $this->transactionDetailRepository->delete($id);

        Flash::success('Transaction Detail deleted successfully.');

        return redirect(route('transactionDetails.index'));
    }
}
