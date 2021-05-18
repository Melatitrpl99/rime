@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buku Besar</h1>
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
                                <th>Tanggal</th>
                                <th>Nama Customer</th>
                                <th>status</th>
                                <th>Produk</th>
                                <th>Sub total</th>
                                <th>Diskon</th>
                                <th>total Harga</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    -
                                </td>
                                <td>

                                </td>
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

<div class="widget-search">
    <i class="fa fa-search"></i>
    <input type="search" class="form-control mb-4" placeholder="cari kata kunci modul" />
</div>
