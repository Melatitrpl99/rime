<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;
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
        $orders = Order::with([
            'status:id,name',
            'user:id,name'
        ])->paginate(15);

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
        $nomor = $faker->regexify('O[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor)
            ->toArray();

        $order = Order::create($input);

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah', 'sub_total'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = User::where('id', $request->user_id)->first()->hasRole('reseller');
            $discount = $request->filled('kode_diskon')
                ? Discount::where('kode', $request->kode_diskon)
                ->with('products')
                ->first()
                : null;

            foreach ($request->product_id as $key => $productId) {
                $product = $products->find($productId);
                $jumlah = $request->jumlah[$key];

                $pivot = $discount
                    ? optional($discount->products->find($productId))->pivot
                    : null;

                $hargaDiskon = $pivot && $jumlah >= $pivot->minimal_produk && $jumlah <= $pivot->maksimal_produk
                    ? $pivot->diskon_harga
                    : null;

                if ($role && $jumlah < $product->reseller_minimum) {
                    $order->products()->detach();
                    $order->forceDelete();

                    flash('Jumlah minimum pembelian untuk reseller kurang.', 'danger');

                    return redirect()->route('admin.orders.index');
                }

                $order->products()->attach($productId, [
                    'color_id'     => $request->color_id[$key],
                    'size_id'      => $request->size_id[$key],
                    'jumlah'       => $jumlah,
                    'diskon'       => $hargaDiskon,
                    'sub_total'    => $role
                        ? $product->harga_reseller * $jumlah
                        : $product->harga_customer * $jumlah
                ]);
            }
        }

        flash('Order saved successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified Order.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Order $order)
    {
        $order->load([
            'products:id,nama,harga_customer,harga_reseller',
            'products.pivot.color:id,name',
            'products.pivot.size:id,name'
        ]);

        return view('admin.orders.show')
            ->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit')
            ->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param \App\Models\Order $order
     * @param \App\Http\Requests\UpdateOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Order $order, UpdateOrderRequest $request)
    {
        // save old values before updating
        $old = $order->load([
            'products:id,nama,harga_customer,harga_reseller',
        ])->replicate();

        $sync = $old->products->mapWithKeys(function ($item, $key) {
            return [$item->id => $item->pivot];
        })->toArray();

        $order->update($request->validated());

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah', 'sub_total'])) {
            $order->products()->detach();

            $products = Product::whereIn('id', $request->product_id)->get();
            $role = User::where('id', $request->user_id)->first()->hasRole('reseller');
            $discount = $request->filled('kode_diskon') ? Discount::where('kode', $request->kode_diskon)
                ->with('products')
                ->first()
                : null;

            foreach ($request->product_id as $key => $productId) {
                $product = $products->find($productId);
                $jumlah = $request->jumlah[$key];

                $pivot = null;
                $isDiscountable = false;
                if ($request->filled('kode_diskon')) {
                    $discountProduct = optional($discount->products)->find($product);

                    if (!empty($discountProduct)) {
                       $pivot = $discountProduct->pivot;
                    }

                    $isDiscountable = (!empty($pivot) && $pivot->minimal_produk > $jumlah
                              && $pivot->maksimal_produk < $jumlah);
                }

                if ($role && $jumlah < $product->reseller_minimum) {
                    $order->products()->detach();
                    $order->update($old->toArray());
                    $order->products()->attach($sync);

                    flash('Jumlah minimum pembelian untuk reseller kurang.', 'danger');

                    return redirect()->route('admin.orders.index');
                }

                $order->products()->attach($productId, [
                    'color_id'  => $request->color_id[$key],
                    'size_id'   => $request->size_id[$key],
                    'jumlah'    => $jumlah,
                    'diskon'    => $hargaDiskon,
                    'sub_total' => $role
                        ? $product->harga_reseller * $jumlah
                        : $product->harga_customer * $jumlah
                ]);
            }
        }

        flash('Order updated successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();

        flash('Order deleted successfully.', 'success');

        return redirect()->route('admin.orders.index');
    }
}
