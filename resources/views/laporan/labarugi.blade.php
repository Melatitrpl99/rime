@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Activities</h1>
                </div>
                <div class="col-sm-6">
                    <div class="dropdown float-right">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Ekspor
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">PDF</a>
                          <a class="dropdown-item" href="#">XLS</a>
                          <a class="dropdown-item" href="#">CSV</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table" id="activities-table">
                        <thead>
                            <tr>
                                <th>Tanggal </th>
                                <th>28/04/2021</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <b>pendapatan dari penjualan</b> </td>
                            </tr>

                            <tr>
                                <td>Total pendapatan dari penjualan </td>
                                <td>0,00</td>
                            </tr>
                            <tr>
                                <td colspan="2"> <b>Harga pokok penjualan</b> </td>
                            </tr>
                            <tr>
                                <td> Total harga pokok penjualan </td>
                                <td>0,00</td>
                            </tr>

                            <tr>
                                <td> <b>Laba Kotor</b> </td>
                                <td>0,00</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"> <b>Biaya Operasional</b> </td>
                            </tr>
                            <tr>
                                <td> Total Biaya </td>
                                <td>0,00</td>
                            </tr>
                            <tr>
                                <td> <b>Pendapatan Bersih Operasional</b> </td>
                                <td>0,00</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"> <b>Pendapatan lainnya</b> </td>
                            </tr>
                            <tr>
                                <td> Total Pendapatan Lainnya </td>
                                <td>0,00</td>
                            </tr>
                            <tr>
                                <td colspan="2"> <b>Biaya Lainnya</b> </td>
                            </tr>
                            <tr>
                                <td> Total Biaya Lainnya </td>
                                <td>0,00</td>
                            </tr>
                            <tr>
                                <td> <b>Pendapatan Bersih</b> </td>
                                <td>0,00</td>
                            </tr>


                        </tbody>
                    </table>
                </div>


                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
