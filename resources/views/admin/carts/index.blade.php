@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Carts</h1>
                <a href="{{ route('admin.carts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Add New
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
                        @include('admin.carts.table')
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items center">
                            <span class="d-block my-auto text-secondary">Displaying {{ $carts->count() }} of {{ $carts->total() }} records</span>
                            {{ $carts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
