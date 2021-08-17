@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Ukuran produk</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Ukuran produk</h1>
                    <a href="{{ route('admin.sizes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-1"></i> Tambah baru
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @include('flash::message')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            @include('admin.sizes.table')
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items center">
                                <span class="d-block my-auto text-secondary">Displaying {{ $sizes->count() }} of {{ $sizes->total() }} records</span>
                                {{ $sizes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
