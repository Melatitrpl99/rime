<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreOrderAPIRequest;
use App\Http\Requests\API\UpdateOrderAPIRequest;
use App\Http\Resources\OrderResource;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class OrderAPIController.
 */
class OrderAPIController extends Controller
{
    /**
     * Display a listing of the Order.
     * GET|HEAD /orders.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->has('skip')) {
            $query->skip($request->get('skip'));
        }

        if ($request->has('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->has('status_id') && $request->get('status_id') != 0) {
            $query->where('status_id', $request->get('status_id'));

            if ($request->get('status_id') > 7) {
                return response()->json(null, 204);
            }
        }

        $orders = $query->where('user_id', auth()->id())
            ->with(['status', 'shipment'])
            ->withSum('products as jumlah', 'order_details.jumlah')
            ->get();

        return response()->json(OrderResource::collection($orders), 200);
    }

    /**
     * Store a newly created Order in storage.
     * POST /orders.
     *
     * @param \App\Http\Requests\StoreOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreOrderAPIRequest $request)
    {
        $user = auth()->user();
        $faker = \Faker\Factory::create();
        $nomor = $faker->regexify('O[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor)
            ->put('status_id', 1)
            ->put('user_id', $user->id)
            ->toArray();

        $order = Order::make($input);

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah'])) {
            $products = Product::whereIn('id', $request->product_id)->get();
            $role = $user->hasRole('reseller');
            $discount = $request->filled('kode_diskon')
                ? Discount::where('kode', $request->kode_diskon)
                ->with('products')
                ->first()
                : null;

            $total = 0;

            foreach ($request->product_id as $key => $productId) {
                $product = $products->find($productId);
                $jumlah = $request->jumlah[$key];
                $subTotal = $role
                    ? $product->harga_reseller * $jumlah
                    : $product->harga_customer * $jumlah;

                $pivot = $discount
                    ? optional($discount->products->find($productId))->pivot
                    : null;

                $hargaDiskon = $pivot && $jumlah >= $pivot->minimal_produk && $jumlah <= $pivot->maksimal_produk
                    ? $pivot->diskon_harga
                    : null;

                $total += $subTotal;
                $order->total = $total;

                $order->save();

                if ($role && $jumlah < $product->reseller_minimum) {
                    $order->products()->detach();
                    $order->forceDelete();

                    return response()->json([
                        'message' => 'Jumlah minimum pembelian untuk reseller kurang.',
                    ], 422);
                }

                $order->products()->attach($productId, [
                    'color_id'     => $request->color_id[$key],
                    'size_id'      => $request->size_id[$key],
                    'jumlah'       => $jumlah,
                    'diskon'       => $hargaDiskon,
                    'sub_total'    => $subTotal,
                ]);
            }
        } else {
            $order->save();
        }

        return response()->json(new OrderResource($order), 201);
    }

    /**
     * Display the specified Order.
     * GET|HEAD /orders/{order}.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function show(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $order->load([
            'products',
            'products.pivot.color',
            'products.pivot.size',
            'products.image',
            'status',
            'shipment',
        ])
            ->loadSum('products', 'order_details.jumlah');

        return response()->json(new OrderResource($order), 200);
    }

    /**
     * Update the specified Order in storage.
     * PUT/PATCH /orders/{order}.
     *
     * @param \App\Models\Order $order
     * @param \App\Http\Requests\UpdateOrderRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Order $order, UpdateOrderAPIRequest $request)
    {
        if ($order->user_id != auth()->id()) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $old = $order->load([
            'products:id,nama,harga_customer,harga_reseller',
        ])->replicate();

        $sync = $old->products->map(function ($item, $key) {
            return $item->pivot;
        })->toArray();

        $order->update($request->validated());

        if ($request->has(['product_id', 'color_id', 'size_id', 'jumlah'])) {
            $order->products()->detach();

            $products = Product::whereIn('id', $request->product_id)->get();
            $role = auth()->user()->hasRole('reseller');
            $discount = $request->filled('kode_diskon') ? Discount::where('kode', $request->kode_diskon)
                ->with('products')
                ->first()
                : null;

            $total = 0;

            foreach ($request->product_id as $key => $productId) {
                $product = $products->find($productId);
                $jumlah = $request->jumlah[$key];
                $subTotal = $role
                    ? $product->harga_reseller * $jumlah
                    : $product->harga_customer * $jumlah;

                $pivot = $discount
                    ? optional($discount->products->find($productId))->pivot
                    : null;

                $hargaDiskon = $pivot && $jumlah >= $pivot->minimal_produk && $jumlah <= $pivot->maksimal_produk
                    ? $pivot->diskon_harga
                    : null;

                $total += $subTotal;
                $order->total = $total;

                $order->save();

                if ($role && $jumlah < $product->reseller_minimum) {
                    $order->products()->detach();
                    $order->update($old->toArray());
                    foreach ($sync as $key => $item) {
                        $order->products()->attach($item['product_id'], $item);
                    }

                    return response()->json([
                        'message' => 'Jumlah minimum pembelian untuk reseller kurang.',
                    ], 422);
                }

                $order->products()->attach($productId, [
                    'color_id'  => $request->color_id[$key],
                    'size_id'   => $request->size_id[$key],
                    'jumlah'    => $jumlah,
                    'diskon'    => $hargaDiskon,
                    'sub_total' => $subTotal,
                ]);
            }
        }

        return response()->json(['message' => 'Updated'], 200);
    }
}
