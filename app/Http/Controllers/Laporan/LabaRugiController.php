<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\OrderTransaction;
use App\Models\Spending;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function index()
    {
        $pemasukan = OrderTransaction::sum('total');
        $pengeluaran = Spending::sum('total');

        $pengeluaran = Spending::all()->sum('total');

        return view('admin.reports.laba_rugi.index')
            ->with('pemasukan', $pemasukan)
            ->with('pengeluaran', $pengeluaran);
    }

    public function pdf(Request $request)
    {
        $pemasukan = OrderTransaction::whereBetween('tanggal_masuk', [now()->subMonth(), now()])
            ->sum('total');
        $pengeluaran = Spending::sum('total');

        $pengeluaran = Spending::all()->sum('total');

        return view('admin.reports.laba_rugi.pdf')
            ->with('pemasukan', $pemasukan)
            ->with('pengeluaran', $pengeluaran);
    }
}
