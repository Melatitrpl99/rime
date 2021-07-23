<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
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
        $transactions = Transaction::paginate(15);

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
        $faker = \Faker\Factory::create();
        $input = collect($request->validated());
        $nomor = $faker->regexify('T[0-9]{2}-[A-Z0-9]{6}');
        $input->put('nomor',$nomor);

        $transaction = Transaction::create($input->toArray());
        if ($request->hasAny(['sub_total'])) {
            $orders = Order::whereIn('id', $request->order_id)->get();
            // dd($role ? 'asdf' : 'zonkers');
            foreach($request->order_id as $key => $orderId) {
                $transaction->orders()->attach($orderId, [
                    'sub_total' => $request->sub_total[$key],
                ]);
            }
        }

        flash('Transaction saved successfully.', 'success');

        return redirect()->route('admin.transactions.index');
    }

    /**
     * Display the specified Transaction.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            flash('Transaction not found', 'error');

            return redirect()->route('admin.transactions.index');
        }

        return view('admin.transactions.show')
            ->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        if (empty($transaction)) {
            flash('Transaction not found', 'error');

            return redirect()->route('admin.transactions.index');
        }

        return view('admin.transactions.edit')
            ->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateTransactionRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            flash('Transaction not found', 'error');

            return redirect()->route('admin.transactions.index');
        }
        $transaction->products()->detach();
        $transaction->update($request->validated());
        if ($request->hasAny(['sub_total'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            // dd($role ? 'asdf' : 'zonkers');
            foreach($request->product_id as $key => $productId) {
                $transaction->products()->attach($productId, [
                'sub_total' => $request->sub_total[$key],
                ]);
            }
        }

        flash('Transaction updated successfully.', 'success');

        return redirect()->route('admin.transactions.index');
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            flash('Transaction not found', 'error');

            return redirect()->route('admin.transactions.index');
        }
        $transaction->products()->detach();
        $transaction->delete();

        flash('Transaction deleted successfully.', 'success');

        return redirect()->route('admin.transactions.index');
    }
}
