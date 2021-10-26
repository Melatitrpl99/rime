@extends('admin._layouts.app')
<title>{{ env('APP_NAME') }} | Ukuran produk</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Ukuran produk</h1>
                    <a href="{{ route('admin.sizes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Tambah baru</span>
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
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="d-none d-sm-block my-auto text-secondary mr-auto">Displaying {{ $sizes->count() }} of {{ $sizes->total() }} records</span>
                                {{ $sizes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
