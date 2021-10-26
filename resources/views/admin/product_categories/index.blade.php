@extends('admin._layouts.app')
<title>{{ env('APP_NAME') }} | Kategori produk</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Kategori produk</h1>
                    <a href="{{ route('admin.product_categories.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Tambah baru</span>
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
                            @include('admin.product_categories.table')
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="d-none d-sm-block my-auto text-secondary mr-auto">Displaying {{ $productCategories->count() }} of {{ $productCategories->total() }} records</span>
                                {{ $productCategories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
