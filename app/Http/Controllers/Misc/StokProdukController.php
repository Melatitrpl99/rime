<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\User;
use Illuminate\Http\Request;

class StokProdukController extends Controller
{
    public function getProductStock(Request $request)
    {
        \Debugbar::disable();

        $productId = $request->get('product_id');
        $stock = ProductStock::with([
            'color:id,name',
            'size:id,name'
        ])->where('product_id', $productId)
            ->get()
            ->except('id')
            ->groupBy('product_id');

        // $output = $stock->mapWithKeys(function ($item, $key) {
        //     return [$item->color_id => $item->color['name']];
        // })->sortKeys()->toJson();

        return $stock;
    }

    public function getColor(Request $request)
    {
        \Debugbar::disable();

        $productId = $request->get('product_id');

        $stock = ProductStock::with('color:id,name')
            ->where('product_id', $productId)
            ->get()
            ->unique('color_id');

        $output = $stock->mapWithKeys(function ($item, $key) {
            return [$item->color_id => $item->color['name']];
        })->sortKeys()->toJson();

        return $output;
    }

    public function getSize(Request $request)
    {
        \Debugbar::disable();

        $productId = $request->get('product_id');
        $colorId = $request->get('color_id');
        $userId = $request->get('user_id');

        $min = 1;
        if (User::find($userId)->hasRole('reseller')) {
            $min = Product::find($productId, 'reseller_minimum')->reseller_minimum;
        }

        $stock = ProductStock::with('size:id,name')
            ->where('product_id', $productId)
            ->where('color_id', $colorId)
            ->where('stok_ready', '>', $min)
            ->get()
            ->unique('size_id');

        $output = $stock->mapWithKeys(function ($item, $key) {
            return [$item->size_id => $item->size['name']];
        })->sortKeys()->toJson();

        return $output;
    }

    public function getStokReady(Request $request)
    {
        \Debugbar::disable();

        $productId = $request->get('product_id');
        $colorId = $request->get('color_id');
        $sizeId = $request->get('size_id');
        $userId = $request->get('user_id');

        $min = 1;
        if (User::find($userId)->hasRole('reseller')) {
            $min = Product::find($productId, 'reseller_minimum')->reseller_minimum;
        }

        $stock = ProductStock::where([
            ['product_id', '=', $productId],
            ['color_id', '=', $colorId],
            ['size_id', '=', $sizeId],
        ])->first();

        // dd($stock);

        return collect(['stok_ready' => $stock->stok_ready])->toJson();
    }
}
