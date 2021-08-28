<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Imports\ImportProductStocks;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        if (!$request->has('excel')) {
            abort(401);
        }

        $excel = $request->file('excel');

        // dd($request);

        // $file = $excel->store('excel', 'public');

        Excel::import(new ImportProductStocks, $excel);

        return redirect()->route('home');
    }

    public function export()
    {
    }
}
