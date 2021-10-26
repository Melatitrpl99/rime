@extends('admin._layouts.app')
<title>{{ env('APP_NAME') }} | Detail pengeluaran</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Detail pengeluaran</h1>
                    <a class="btn btn-danger ml-auto" href="{{ route('admin.spendings.edit', $spending) }}">
                        <i class="far fa-edit mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Update</span>
                    </a>
                    <a class="btn btn-info ml-2" href="{{ route('admin.spendings.index') }}">
                        <i class="fas fa-angle-double-left mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.spendings.show_fields')
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            @include('admin.spendings.table_details')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
