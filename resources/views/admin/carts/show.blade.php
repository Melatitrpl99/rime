@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Cart Details</h1>
                    <a class="btn btn-default" href="{{ route('admin.carts.index') }}">Back</a>
                </div>
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
                        @include('admin.carts.show_fields')
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 table-responsive">
                        @include('admin.carts.table_details')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
