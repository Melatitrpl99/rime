<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Spending;
use DB;
use Faker\Factory;
use Illuminate\Http\Request;

/**
 * Class SpendingController.
 */
class SpendingController extends Controller
{
    /**
     * Display a listing of the Spending.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $spendings = Spending::with('spendingCategory')
            ->withSum('products as jumlah', 'spending_details.jumlah_item')
            ->paginate(15);

        return view('admin.spendings.index')
            ->with('spendings', $spendings);
    }

    /**
     * Show the form for creating a new Spending.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.spendings.create');
    }

    /**
     * Store a newly created Spending in storage.
     *
     * @param \App\Http\Requests\StoreSpendingRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreSpendingRequest $request)
    {
        $faker = Factory::create();
        $nomor = $faker->regexify('S[0-9]{2}-[A-Z0-9]{6}');
        $input = collect($request->validated())
            ->put('nomor', $nomor);

        $stok = [];
        $total = 0;

        $spending = Spending::create($input->toArray());

        if ($request->hasAny(['product_id', 'nama', 'ket', 'jumlah_item', 'jumlah_stok', 'spending_unit_id', 'color_id', 'size_id'])) {

            $productStocks = ProductStock::whereIn('product_id', $request->product_id)->get();

            foreach ($request->product_id as $key => $id) {
                $productStock = $productStocks->where('product_id', $id)
                    ->where('color_id', $request->color_id[$key])
                    ->where('size_id', $request->size_id[$key])
                    ->first();

                $subTotal = $request->sub_total[$key] ?? 0;
                $hargaSatuan = (int) $request->harga_satuan[$key] ?? 0;
                $jumlah = $request->jumlah_stok[$key];

                if ($request->has('harga_satuan')) {
                    $subTotal = (int) $request->jumlah_item[$key] * $hargaSatuan;
                }

                $total += $subTotal;

                $spending->products()->attach($id, [
                    'nama' => $request->nama[$key],
                    'ket' => $request->ket[$key],
                    'harga_satuan' => $request->harga_satuan[$key] ?? null,
                    'jumlah_item' => $request->jumlah_item[$key] ?? null,
                    'jumlah_stok' => $jumlah,
                    'sub_total' => $subTotal,
                    'spending_unit_id' => $request->spending_unit_id[$key],
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                ]);

                $stok[$key] = [
                    'product_id' => $id,
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                    'stok_ready' => ($productStock)
                        ? $jumlah + $productStock->stok_ready
                        : $jumlah,
                ];
            }
        }

        $spending->update(['total' => $total]);
        ProductStock::upsert($stok, ['product_id', 'color_id', 'size_id'], ['stok_ready']);

        flash('Spending saved successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }

    /**
     * Display the specified Spending.
     *
     * @param \App\Models\Spending $spending
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Spending $spending)
    {
        $spending->load(['products', 'products.pivot.spendingUnit']);

        return view('admin.spendings.show')
            ->with('spending', $spending);
    }

    /**
     * Show the form for editing the specified Spending.
     *
     * @param \App\Models\Spending $spending
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Spending $spending)
    {
        $spending->load(['products', 'products.pivot.spendingUnit']);

        return view('admin.spendings.edit')
            ->with('spending', $spending);
    }

    /**
     * Update the specified Spending in storage.
     *
     * @param \App\Models\Spending $spending
     * @param \App\Http\Requests\UpdateSpendingRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Spending $spending, UpdateSpendingRequest $request)
    {
        $input = collect($request->validated());

        $pivot = [];
        $stok = [];
        $total = 0;


        if ($request->hasAny(['product_id', 'nama', 'ket', 'jumlah_item', 'jumlah_stok', 'spending_unit_id', 'color_id', 'size_id'])) {

            $spending->products()->detach();
            $productStocks = ProductStock::whereIn('product_id', $request->product_id)->get();

            foreach ($request->product_id as $key => $id) {
                $productStock = $productStocks->where('product_id', $id)
                    ->where('color_id', $request->color_id[$key])
                    ->where('size_id', $request->size_id[$key])
                    ->first();

                $oldProduct = $spending->products()
                    ->wherePivot('product_id', $id)
                    ->wherePivot('color_id', $request->color_id[$key])
                    ->wherePivot('size_id', $request->size_id[$key])
                    ->first();

                $subTotal = $request->sub_total[$key] ?? 0;
                $hargaSatuan = (int) $request->harga_satuan[$key] ?? 0;
                $jumlah = (int) $request->jumlah_stok[$key];

                if ($request->has('harga_satuan')) {
                    $subTotal = (int) $request->jumlah_item[$key] * $hargaSatuan;
                }

                $total += $subTotal;

                $spending->products()->attach($id, [
                    'nama' => $request->nama[$key],
                    'ket' => $request->ket[$key],
                    'harga_satuan' => $request->harga_satuan[$key] ?? null,
                    'jumlah_item' => $request->jumlah_item[$key] ?? null,
                    'jumlah_stok' => $jumlah,
                    'sub_total' => $subTotal,
                    'spending_unit_id' => $request->spending_unit_id[$key],
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                ]);

                $stok[$key] = [
                    'product_id' => $id,
                    'color_id' => $request->color_id[$key],
                    'size_id' => $request->size_id[$key],
                    'stok_ready' => ($productStock)
                        ? $jumlah + ($productStock->stok_ready - $oldProduct->pivot->jumlah_stok)
                        : $jumlah,
                ];
            }
        }

        $input->put('total', $total);
        $spending->update($input->toArray());

        ProductStock::upsert($stok, ['product_id', 'color_id', 'size_id'], ['stok_ready']);

        flash('Spending updated successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }

    /**
     * Remove the specified Spending from storage.
     *
     * @param \App\Models\Spending $spending
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Spending $spending)
    {
        $spending->products()->detach();
        $spending->delete();

        flash('Spending deleted successfully.', 'success');

        return redirect()->route('admin.spendings.index');
    }
}
