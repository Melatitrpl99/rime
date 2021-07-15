@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>Transaction Details</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card">
            <div class="card-body p-0 table-responsive">
                @include('admin.transaction_details.table')
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items center">
                    <span class="d-block my-auto text-secondary">Displaying {{ $transactionDetails->count() }} of {{ $transactionDetails->total() }} records</span>
                    {{ $transactionDetails->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
