<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        $faker = \Faker\Factory::create();
        $input = collect($request->validated());
        $nomor = $faker->regexify('O[0-9]{2}-[A-Z0-9]{6}');
        $input->put('nomor',$nomor);

        $order = Order::create($input->toArray());

        if ($request->hasAny(['product_id', 'color_id', 'dimension_id', 'size_id', 'jumlah', 'sub_total'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = User::where('id', $request->user_id)->first()->hasRole('reseller');
            foreach($request->product_id as $key => $productId) {
                $order->products()->attach($productId, [
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                    'dimension_id' => $request->dimension_id[$key],
                    'jumlah' => $request->jumlah[$key],
                    'sub_total' => $role ? $products[$key]->harga_reseller * $request->jumlah[$key] : $products[$key]->harga_customer * $request->jumlah[$key]
                ]);
            }
        }

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
        $order = Order::with(['user', 'products.pivot.color', 'products.pivot.dimension', 'products.pivot.size'])->find($id);

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
        $order = Order::with(['user', 'products.pivot.color', 'products.pivot.dimension', 'products.pivot.size'])->find($id);
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

        $order->products()->detach();
        $order->update($request->validated());

        if ($request->hasAny(['product_id', 'color_id', 'dimension_id', 'size_id', 'jumlah', 'sub_total'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = User::where('id', $request->user_id)->first()->hasRole('reseller');
            foreach($request->product_id as $key => $productId) {
                $order->products()->attach($productId, [
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                    'dimension_id' => $request->dimension_id[$key],
                    'jumlah' => $request->jumlah[$key],
                    'sub_total' => $role ? $products[$key]->harga_reseller * $request->jumlah[$key] : $products[$key]->harga_customer * $request->jumlah[$key]
                ]);
            }
        }

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
        $order->products()->detach();
        $order->delete();

        flash('Order deleted successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }
}
