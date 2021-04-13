@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengeluaran</h1>
                </div>
                <div class="col-sm-6">
                    <div class="dropdown float-right">
                    <div class="d-flex align-items-center justify-items-end">
                        <div class="input-group mr-2">
                            <input type="text" class="form-control" placeholder="pencarian" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">@example.com</span>
                            </div>
                          </div>
                        <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <th>Nomor</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>jumlah barang</th>
                                <th>Total</th>
                                <th>Biaya tambahan/lain</th>
                                <th>Sub Total</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
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
