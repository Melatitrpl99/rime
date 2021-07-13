@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 col-sm-6">
                <h1>Product Colors</h1>
            </div>
            <div class="col-12 col-sm-6">
                <a class="btn btn-primary float-right"
                   href="{{ route('admin.colors.create') }}">
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
            <div class="card-body p-0">
                @include('admin.colors.table')
            </div>
        </div>
    </div>
</section>
@endsection
