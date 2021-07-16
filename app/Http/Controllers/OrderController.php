<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the Order.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $orders = Order::paginate(15);

        return view('admin.orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param \App\Http\Requests\CreateOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());

        flash('Order saved successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified Order.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            flash('Order not found', 'error');

            return redirect()->route('admin.orders.index');
        }

        return view('admin.orders.show')
            ->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $order = Order::find($id);
        if (empty($order)) {
            flash('Order not found', 'error');

            return redirect()->route('admin.orders.index');
        }

        return view('admin.orders.edit')
            ->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = Order::find($id);

        if (empty($order)) {
            flash('Order not found', 'error');

            return redirect()->route('admin.orders.index');
        }

        $order->update($request->validated());

        flash('Order updated successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            flash('Order not found', 'error');

            return redirect()->route('admin.orders.index');
        }

        $order->delete();

        flash('Order deleted successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }
}