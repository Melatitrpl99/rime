<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransactionDetailAPIRequest;
use App\Http\Requests\API\UpdateTransactionDetailAPIRequest;
use App\Models\TransactionDetail;
use App\Repositories\TransactionDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TransactionDetailResource;
use Response;

/**
 * Class TransactionDetailController
 * @package App\Http\Controllers\API
 */

class TransactionDetailAPIController extends AppBaseController
{
    /** @var  TransactionDetailRepository */
    private $transactionDetailRepository;

    public function __construct(TransactionDetailRepository $transactionDetailRepo)
    {
        $this->transactionDetailRepository = $transactionDetailRepo;
    }

    /**
     * Display a listing of the TransactionDetail.
     * GET|HEAD /transactionDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $transactionDetails = $this->transactionDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TransactionDetailResource::collection($transactionDetails), 'Transaction Details retrieved successfully');
    }

    /**
     * Store a newly created TransactionDetail in storage.
     * POST /transactionDetails
     *
     * @param CreateTransactionDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionDetailAPIRequest $request)
    {
        $input = $request->all();

        $transactionDetail = $this->transactionDetailRepository->create($input);

        return $this->sendResponse(new TransactionDetailResource($transactionDetail), 'Transaction Detail saved successfully');
    }

    /**
     * Display the specified TransactionDetail.
     * GET|HEAD /transactionDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            return $this->sendError('Transaction Detail not found');
        }

        return $this->sendResponse(new TransactionDetailResource($transactionDetail), 'Transaction Detail retrieved successfully');
    }

    /**
     * Update the specified TransactionDetail in storage.
     * PUT/PATCH /transactionDetails/{id}
     *
     * @param int $id
     * @param UpdateTransactionDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransactionDetail $transactionDetail */
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            return $this->sendError('Transaction Detail not found');
        }

        $transactionDetail = $this->transactionDetailRepository->update($input, $id);

        return $this->sendResponse(new TransactionDetailResource($transactionDetail), 'TransactionDetail updated successfully');
    }

    /**
     * Remove the specified TransactionDetail from storage.
     * DELETE /transactionDetails/{id}
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
        $transactionDetail = $this->transactionDetailRepository->find($id);

        if (empty($transactionDetail)) {
            return $this->sendError('Transaction Detail not found');
        }

        $transactionDetail->delete();

        return $this->sendSuccess('Transaction Detail deleted successfully');
    }
}
