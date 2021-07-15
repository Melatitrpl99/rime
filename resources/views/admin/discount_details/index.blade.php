@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Discount Details</h1>
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
                            @include('admin.discount_details.table')
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items center">
                                <span class="d-block my-auto text-secondary">Displaying {{ $discountDetails->count() }} of {{ $discountDetails->total() }} records</span>
                                {{ $discountDetails->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

