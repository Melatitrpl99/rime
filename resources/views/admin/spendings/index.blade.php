@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Spendings</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('admin.spendings.create') }}">
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
                    <div class="cleafix"></div>
                    <div class="card">
                        <div class="card-body p-0">
                            @include('admin.spendings.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

