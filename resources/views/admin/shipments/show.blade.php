@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Detail alamat pengiriman</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Detail alamat pengiriman</h1>
                    <a class="btn btn-danger ml-auto" href="{{ route('admin.shipments.edit', $shipment) }}"><i class="far fa-edit mr-1"></i> Update</a>
                    <a class="btn btn-info ml-2" href="{{ route('admin.shipments.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Kembali</a>
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
                            @include('admin.shipments.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
