@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Transaction Details</h1>
                <a class="btn btn-danger ml-auto" href="{{ route('admin.transactions.edit', $transaction->id) }}"><i class="far fa-edit mr-1"></i> Update</a>
                <a class="btn btn-info ml-2" href="{{ route('admin.transactions.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Back</a>
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
                        @include('admin.transactions.show_fields')
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 table-responsive">
                        @include('admin.transactions.table_details')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-header mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Transaction orders</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            @include('admin.transactions.show_orders')
        </div>
    </div>
</div>
@endsection
