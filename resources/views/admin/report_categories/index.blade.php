@extends('admin._layouts.app')
<title>{{ env('APP_NAME') }} | Report Categories</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Report Categories</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('admin.report_categories.create') }}" class="btn btn-primary float-right">
                        Add New
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
                            @include('admin.report_categories.table')
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
