@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Delivery Cost Details</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Delivery Cost Details</h1>
                        <a class="btn btn-default" href="{{ route('admin.delivery_costs.index') }}">Back</a>
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
                            @include('admin.delivery_costs.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
