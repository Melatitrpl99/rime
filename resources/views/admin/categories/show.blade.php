@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1>Category Details</h1>
            </div>
        </div>
    </div>
</section>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @include('admin.categories.show_fields')
            </div>
        </div>
    </div>
</div>
@endsection
