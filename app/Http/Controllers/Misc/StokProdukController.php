<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use Illuminate\Http\Request;

class StokProdukController extends Controller
{
    public function getProductStock(Request $request)
    {
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
        $productId = $request->get('product_id');
        $colorId = $request->get('color_id');

        $stock = ProductStock::with('size:id,name')
            ->where('product_id', $productId)
            ->where('color_id', $colorId)
            ->get()
            ->unique('size_id');

        $output = $stock->mapWithKeys(function ($item, $key) {
            return [$item->size_id => $item->size['name']];
        })->sortKeys()->toJson();

        return $output;
    }

    public function getStokCount(Request $request)
    {
        $productId = $request->get('product_id');
        $colorId = $request->get('color_id');
        $sizeId = $request->get('size_id');

        $stock = ProductStock::firstWhere('product_id', $productId);
        return $stock->pluck('stok_ready', 'id')->toJson();
    }
}
