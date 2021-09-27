<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreOrderAPIRequest;
use App\Http\Resources\OrderResource;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Validator;

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

        if ($request->get('status_id') == 0) {
            $query->isOngoing();
        }

        if ($request->get('status_id') > 0 && $request->get('status_id') < 8) {
            $query->whereStatusId($request->get('status_id'));
        }

        if ($request->get('status_id') == 8) {
            $query->allProcessed();
        }

        if ($request->get('status_id') > 8) {
            return response()->json(['message' => 'Unknown query'], 422);
        }

        $orders = $query->whereUserId(auth()->id())
            ->orderByDesc('updated_at')
            ->with(['status', 'userShipment'])
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
        $hasRole = $user->hasRole('reseller');

        $faker = Factory::create();
        $nomor = $faker->regexify('O[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor)
            ->put('status_id', 1)
            ->put('user_id', $user->id);

        $discount = $request->filled('kode_diskon')
            ? Discount::where('kode', $request->kode_diskon)
            ->with('products')
            ->first()
            : null;

        if ($discount) {
            $input->put('discount_id', $discount->id);
        }

        $total = 0;
        $productId = array_values($request->only('product_id'))[0];
        $colorId = array_values($request->only('color_id'))[0];
        $sizeId = array_values($request->only('size_id'))[0];
        $jumlah = array_values($request->only('jumlah'))[0];

        $products = Product::whereIn('id', $productId)
            ->get(['id', 'nama', 'harga_customer', 'harga_reseller', 'reseller_minimum']);

        $order = Order::create($input->toArray());

        foreach ($productId as $key => $id) {
            $product = $products->find($id);

            $productStock = $product->productStocks()->where([
                ['color_id', '=', $colorId[$key]],
                ['size_id', '=', $sizeId[$key]],
            ])->first();

            if (!$productStock) {
                return response()->json(['message' => 'tidak dapat menemukan produk dengan warna dan ukuran yang dipesan'], 422);
            }

            try {
                $validator = Validator::make(
                    ['jumlah' => $jumlah[$key]],
                    ['jumlah' => ['numeric', 'max:' . $productStock->stok_ready]],
                    ['jumlah.max' => 'Jumlah pembelian barang ' . $product->nama . 'melewati batas stok tersedia']
                )->validate();
            } catch (ValidationException $e) {
                $order->products()->detach();
                $order->forceDelete();
            }

            $discountPivot = $discount
                ? optional($discount->products->find($id))->pivot
                : null;

            $diskon = $discountPivot
                && $jumlah >= $discountPivot->minimal_produk
                && $jumlah <= $discountPivot->maksimal_produk
                ? $discountPivot->diskon_harga
                : null;

            $subTotal = ($hasRole && $jumlah[$key] >= $product->reseller_minimum)
                ? $product->harga_reseller * $jumlah[$key]
                : $product->harga_customer * $jumlah[$key];

            $total += $subTotal;

            $productStock->update(['stok_ready' => $productStock->stok_ready - $jumlah[$key]]);

            $order->products()->attach($id, [
                'color_id' => $colorId[$key],
                'size_id' => $sizeId[$key],
                'jumlah' => $jumlah[$key],
                'sub_total' => $subTotal,
                'diskon' => $diskon,
            ]);
        }

        $order->update(['total' => $total]);

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
            'userShipment',
            'paymentMethod',
        ])
            ->loadExists('orderTransaction as is_paid')
            ->loadSum('products as jumlah', 'order_details.jumlah');

        return response()->json(new OrderResource($order), 200);
    }
}
