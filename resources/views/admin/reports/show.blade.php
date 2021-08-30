@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Report Details</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Report Details</h1>
                        <a class="btn btn-default" href="{{ route('admin.reports.index') }}">Back</a>
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
                            @include('admin.reports.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
