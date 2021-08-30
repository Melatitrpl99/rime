<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Validator;

/**
 * Class OrderController.
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
            'user:id,nama_lengkap',
        ])
            ->doesntHave('orderTransactions')
            ->orderByDesc('id')
            ->paginate($request->get('per_page') ?? 15);

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
     * @param \App\Http\Requests\StoreOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $faker = Factory::create();
        $nomor = $faker->regexify('O[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor);

        $hasRole = User::where('id', $request->user_id)->first()->hasRole('reseller');

        $discount = $request->filled('kode_diskon')
            ? Discount::where('kode', $request->kode_diskon)
            ->with('products')
            ->first()
            : null;

        if ($discount) {
            $input->put('discount_id', $discount->id);
        }

        $total = 0;
        $pivot = [];
        $productId = array_values($request->only('product_id'))[0];
        $colorId = array_values($request->only('color_id'))[0];
        $sizeId = array_values($request->only('size_id'))[0];
        $jumlah = array_values($request->only('jumlah'))[0];

        $products = Product::whereIn('id', $productId)
            ->get(['id', 'nama', 'harga_customer', 'harga_reseller', 'reseller_minimum']);

        foreach ($productId as $key => $id) {
            $product = $products->find($id);

            $productStock = $product->productStocks()->where([
                ['color_id', '=', $colorId[$key]],
                ['size_id', '=', $sizeId[$key]],
            ])->first();

            $validateRules['jumlah'] = ['numeric', 'max:' . $productStock->stok_ready];
            $validateMessages['jumlah.max'] = 'Jumlah pembelian barang ' . $product->nama . 'melewati batas stok ready';

            if ($hasRole) {
                $validateRules['jumlah'] = ['numeric', 'min:' . $product->reseller_minimum, 'max:' . $productStock->stok_ready];
                $validateMessages['jumlah.min'] = 'Jumlah pembelian barang ' . $product->nama . ' untuk reseller minimal :min';
            }

            $validator = Validator::make(
                ['jumlah' => $jumlah[$key]],
                $validateRules,
                $validateMessages
            )->validate();

            $discountPivot = $discount
                ? optional($discount->products->find($id))->pivot
                : null;

            $diskon = $discountPivot
                && $jumlah >= $discountPivot->minimal_produk
                && $jumlah <= $discountPivot->maksimal_produk
                ? $discountPivot->diskon_harga
                : null;

            $harga = $hasRole ? $product->harga_reseller : $product->harga_reseller;
            $subTotal = $harga * $jumlah[$key];
            $total = $total + $subTotal;

            $productStock->update(['stok_ready' => $productStock->stok_ready - $jumlah[$key]]);

            $pivot[$id] = [
                'color_id' => $colorId[$key],
                'size_id' => $sizeId[$key],
                'jumlah' => $jumlah[$key],
                'sub_total' => $subTotal,
                'diskon' => $diskon,
            ];
        }

        $input->put('total', $total);
        $order = Order::create($input->toArray());
        $order->products()->sync($pivot);

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
            'products.pivot.size:id,name',
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
        $order->load('products');
        $input = collect($request->validated());

        $products = Product::whereIn('id', $request->product_id)->get();
        $hasRole = User::where('id', $request->user_id)->first()->hasRole('reseller');
        $discount = $request->filled('kode_diskon')
            ? Discount::where('kode', $request->kode_diskon)->with('products')->first()
            : ($order->discount()->exists() ? $order->discount->load('products') : null);

        if ($discount && !$input->contains('discount_id')) {
            $input->put('discount_id', $discount->id);
        }

        $pivot = [];
        $total = 0;
        $productId = array_values($request->only('product_id'))[0];
        $colorId = array_values($request->only('color_id'))[0];
        $sizeId = array_values($request->only('size_id'))[0];
        $jumlah = array_values($request->only('jumlah'))[0];

        $order->products->each(function ($product) {
            $productStock = $product->productStocks()->where([
                ['color_id', '=', $product->pivot->color_id],
                ['size_id', '=', $product->pivot->size_id],
            ])->first();

            $productStock->update(['stok_ready' => $productStock->stok_ready + $product->pivot->jumlah]);
        });

        foreach ($productId as $key => $id) {
            $product = $products->find($id);

            $productStock = $product->productStocks()->where([
                ['color_id', '=', $colorId[$key]],
                ['size_id', '=', $sizeId[$key]],
            ])->first();

            $validateRules['jumlah'] = ['numeric', 'max:' . $productStock->stok_ready];
            $validateMessages['jumlah.max'] = 'Jumlah pembelian barang ' . $product->nama . 'melewati batas stok ready';

            if ($hasRole) {
                $validateRules['jumlah'] = ['numeric', 'min:' . $product->reseller_minimum, 'max:' . $productStock->stok_ready];
                $validateMessages['jumlah.min'] = 'Jumlah pembelian barang ' . $product->nama . ' untuk reseller minimal :min';
            }

            $validator = Validator::make(
                ['jumlah' => $jumlah[$key]],
                $validateRules,
                $validateMessages
            )->validate();

            $discountPivot = $discount
                ? optional($discount->products->find($id))->pivot
                : null;

            $diskon = $discountPivot
                && $jumlah >= $discountPivot->minimal_produk
                && $jumlah <= $discountPivot->maksimal_produk
                ? $discountPivot->diskon_harga
                : null;

            $harga = $hasRole ? $product->harga_reseller : $product->harga_reseller;
            $subTotal = $harga * $jumlah[$key];
            $total = $total + $subTotal;

            // dd($order->products->find($id)->pivot->jumlah);
            $productStock->update(['stok_ready' => $productStock->stok_ready - $jumlah[$key]]);

            $pivot[$id] = [
                'color_id' => $colorId[$key],
                'size_id' => $sizeId[$key],
                'jumlah' => $jumlah[$key],
                'sub_total' => $subTotal,
                'diskon' => $diskon,
            ];
        }

        $input->put('total', $total);
        $order->update($input->toArray());
        $order->products()->sync($pivot);

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
