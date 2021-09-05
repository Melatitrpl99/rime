<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductStock;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ids = null;
        if ($request->has('color_id')) {
            $ids = ProductStock::where('product_id', $request->get('product_id'))
                ->where('color_id', $request->get('color_id'))
                ->pluck('size_id')
                ->toArray();
        } else {
            $ids = ProductStock::where('product_id', $request->get('product_id'))
                ->pluck('size_id')
                ->toArray();
        }

        $sizes = Size::whereIn('id', $ids)->get(['id', 'name']);

        return response()->json($sizes);
    }
}
