@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Status Details</h1>
                <a class="btn btn-info ml-2" href="{{ route('admin.statuses.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Back</a>
            </div>
        </div>
    </div>
</section>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.statuses.show_fields')
            </div>
        </div>
    </div>
</div>
@endsection
