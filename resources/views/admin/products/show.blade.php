@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Detail produk</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Detail produk</h1>
                    <a class="btn btn-danger ml-auto" href="{{ route('admin.products.edit', $product) }}"><i class="far fa-edit mr-1"></i> Update</a>
                    <a class="btn btn-info ml-2" href="{{ route('admin.products.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.products.show_fields')
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            @include('admin.products.table_details')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
