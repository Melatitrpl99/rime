<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransactionAPIRequest;
use App\Http\Requests\API\UpdateTransactionAPIRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use Response;

/**
 * Class TransactionController
 * @package App\Http\Controllers\API
 */

class TransactionAPIController extends Controller
{
    /**
     * Display a listing of the Transaction.
     * GET|HEAD /transactions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Transaction::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $transactions = $query->get();

        return response()->json(TransactionResource::collection($transactions));
    }

    /**
     * Store a newly created Transaction in storage.
     * POST /transactions
     *
     * @param CreateTransactionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Transaction $transaction */
        $transaction = Transaction::create($input);

        return response()->json(new TransactionResource($transaction));
    }

    /**
     * Display the specified Transaction.
     * GET|HEAD /transactions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }

        return response()->json(new TransactionResource($transaction));
    }

    /**
     * Update the specified Transaction in storage.
     * PUT/PATCH /transactions/{id}
     *
     * @param int $id
     * @param UpdateTransactionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionAPIRequest $request)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }

        $transaction->fill($request->all());
        $transaction->save();

        return response()->json(new TransactionResource($transaction));
    }

    /**
     * Remove the specified Transaction from storage.
     * DELETE /transactions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }

        $transaction->delete();

        return $this->sendSuccess('Transaction deleted successfully');
    }
}
