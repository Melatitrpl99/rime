@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Laporan Laba Rugi</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between aligh-items-center">
                    <h1 class="mr-auto">Laporan Laba Rugi</h1>
                    <div class="dropdown menu-right mr-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-export mr-sm-1"></i>
                            <span class="d-none d-sm-inline">Ekspor</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" id="rime">File Dokumen (.PDF)</a>
                            <a class="dropdown-item" href="#">File Excel (.XLS)</a>
                            <a class="dropdown-item" href="#">File CSV</a>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-save mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Simpan</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table table-borderless" id="laba-rugi-table" style="min-width: 1024px">
                                <thead>
                                    <tr>
                                        <td class="border-bottom">
                                        <span class="text-md">Tanggal: {{ now()->format('d F Y') }}</span>
                                        </td>
                                        <td width="200" class="border-bottom"></td>
                                        <td width="200" class="border-bottom"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <b>Pendapatan</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="pl-5">Total pendapatan dari penjualan</span>
                                        </td>
                                        <td class="text-right">{{ rp($pemasukan) }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <b>Pengeluaran / Harga pokok penjualan</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="pl-5">Total Pengeluaran</span>
                                        </td>
                                        <td colspan="2" class="text-right">{{ rp($pengeluaran) }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="pl-5">Laba Kotor</span>
                                        </td>
                                        <td colspan="2" class="text-right">{{ rp($pemasukan - $pengeluaran) }}</td>

                                    </tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr>
                                        <td><b>Pendapatan Bersih</b></td>
                                        <td colspan="2" class="text-right">{{ rp($pemasukan - $pengeluaran) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#rime').click(() => {
            window.print();
        })
    </script>
@endpush
