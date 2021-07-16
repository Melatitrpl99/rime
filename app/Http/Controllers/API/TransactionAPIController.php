<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransactionAPIRequest;
use App\Http\Requests\API\UpdateTransactionAPIRequest;
use App\Http\Resources\TransactionResource;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

/**
 * Class TransactionAPIController
 * @package App\Http\Controllers\API
 */
class TransactionAPIController extends Controller
{
    /**
     * Display a listing of the Transaction.
     * GET|HEAD /transactions
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
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

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => TransactionResource::collection($transactions)
        ]);
    }

    /**
     * Store a newly created Transaction in storage.
     * POST /transactions
     *
     * @param \App\Http\Requests\CreateTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateTransactionAPIRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        return response()->json([
            'message' => 'Successfully added',
            'status' => 'success',
            'data' => new TransactionResource($transaction)
        ]);
    }

    /**
     * Display the specified Transaction.
     * GET|HEAD /transactions/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        return response()->json([
            'message' => 'Successfully retrieved',
            'status' => 'success',
            'data' => new TransactionResource($transaction)
        ]);
    }

    /**
     * Update the specified Transaction in storage.
     * PUT/PATCH /transactions/{$id}
     *
     * @param $id
     * @param \App\Http\Requests\UpdateTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateTransactionAPIRequest $request)
    {
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $transaction->update($request->validated());

        return response()->json([
            'message' => 'Successfully updated',
            'status' => 'success',
            'data' => new TransactionResource($transaction)
        ]);
    }

    /**
     * Remove the specified Transaction from storage.
     * DELETE /transactions/{$id}
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            return response()->json([
                'message' => 'Not found',
                'status' => 'error'
            ]);
        }

        $transaction->delete();

        return response()->json([
            'message' => 'Successfully deleted',
            'status' => 'success'
        ]);
    }
}