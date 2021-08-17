@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Detail Aktivitas</title>

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Detail aktivitas</h1>
                <a class="btn btn-info" href="{{ route('admin.activities.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Back</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.activities.show_fields')
            </div>
        </div>
    </div>
</section>
@endsection
