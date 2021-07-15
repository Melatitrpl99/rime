@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>Colors</h1>
            </div>
            <div class="col-6">
                <a class="btn btn-primary float-right" href="{{ route('admin.colors.create') }}">
                    Add New
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card">
            <div class="card-body p-0 table-responsive">
                @include('admin.colors.table')
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items center">
                    <span class="d-block my-auto text-secondary">Displaying {{ $colors->count() }} of {{ $colors->total() }} records</span>
                    {{ $colors->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
