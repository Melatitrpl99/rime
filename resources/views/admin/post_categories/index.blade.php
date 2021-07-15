@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>Post Categories</h1>
            </div>
            <div class="col-6">
                <a class="btn btn-primary float-right" href="{{ route('admin.post_categories.create') }}">
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
                        @include('admin.post_categories.table')
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items center">
                            <span class="d-block my-auto text-secondary">Displaying {{ $postCategories->count() }} of {{ $postCategories->total() }} records</span>
                            {{ $postCategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
