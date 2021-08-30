<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderTransactionRequest;
use App\Http\Requests\UpdateOrderTransactionRequest;
use App\Models\OrderTransaction;
use Faker\Factory;
use Illuminate\Http\Request;

/**
 * Class OrderTransactionController.
 */
class OrderTransactionController extends Controller
{
    /**
     * Display a listing of the OrderTransaction.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $orderTransactions = OrderTransaction::with(['order.user'])->paginate(15);

        return view('admin.order_transactions.index')
            ->with('orderTransactions', $orderTransactions);
    }

    /**
     * Show the form for creating a new OrderTransaction.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.order_transactions.create');
    }

    /**
     * Store a newly created OrderTransaction in storage.
     *
     * @param \App\Http\Requests\StoreOrderTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreOrderTransactionRequest $request)
    {
        $faker = Factory::create();
        $nomor = $faker->regexify('T[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor);

        OrderTransaction::create($input->toArray());

        flash('Order Transaction saved successfully.', 'success');

        return redirect()->route('admin.order_transactions.index');
    }

    /**
     * Display the specified OrderTransaction.
     *
     * @param \App\Models\OrderTransaction $orderTransaction
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(OrderTransaction $orderTransaction)
    {
        $orderTransaction->load('order.products');

        return view('admin.order_transactions.show')
            ->with('orderTransaction', $orderTransaction);
    }

    /**
     * Show the form for editing the specified OrderTransaction.
     *
     * @param \App\Models\OrderTransaction $orderTransaction
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(OrderTransaction $orderTransaction)
    {
        return view('admin.order_transactions.edit')
            ->with('orderTransaction', $orderTransaction);
    }

    /**
     * Update the specified OrderTransaction in storage.
     *
     * @param \App\Models\OrderTransaction $orderTransaction
     * @param \App\Http\Requests\UpdateOrderTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(OrderTransaction $orderTransaction, UpdateOrderTransactionRequest $request)
    {
        $orderTransaction->update($request->validated());

        flash('Order Transaction updated successfully.', 'success');

        return redirect()->route('admin.order_transactions.index');
    }

    /**
     * Remove the specified OrderTransaction from storage.
     *
     * @param \App\Models\OrderTransaction $orderTransaction
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(OrderTransaction $orderTransaction)
    {
        $orderTransaction->delete();

        flash('Order Transaction deleted successfully.', 'success');

        return redirect()->route('admin.order_transactions.index');
    }
}
