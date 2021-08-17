@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Status</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Status</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @include('flash::message')
            <div class="card">
                <div class="card-body p-0 table-responsive">
                    @include('admin.statuses.table')
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items center">
                        <span class="d-block my-auto text-secondary">Displaying {{ $statuses->count() }} of {{ $statuses->total() }} records</span>
                        {{ $statuses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
