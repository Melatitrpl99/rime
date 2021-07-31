<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * Display a listing of the Transaction.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $transactions = Transaction::with(['user.roles'])->paginate(15);

        return view('admin.transactions.index')
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param \App\Http\Requests\CreateTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateTransactionRequest $request)
    {
        Transaction::create($request->validated());

        flash('Transaction saved successfully.', 'success');

        return redirect()->route('admin.transactions.index');
    }

    /**
     * Display the specified Transaction.
     *
     * @param \App\Models\Transaction $transaction
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show')
            ->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param \App\Models\Transaction $transaction
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transactions.edit')
            ->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param \App\Models\Transaction $transaction
     * @param \App\Http\Requests\UpdateTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Transaction $transaction, UpdateTransactionRequest $request)
    {
        $transaction->update($request->validated());

        flash('Transaction updated successfully.', 'success');

        return redirect()->route('admin.transactions.index');
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param \App\Models\Transaction $transaction
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        flash('Transaction deleted successfully.', 'success');

        return redirect()->route('admin.transactions.index');
    }
}
