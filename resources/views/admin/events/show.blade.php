@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Event Details</h1>
            </div>
        </div>
    </div>
</section>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.events.show_fields')
            </div>
        </div>
    </div>
</div>
@endsection
