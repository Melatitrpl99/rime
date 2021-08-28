@extends('layouts.app')
<title>{{ env('APP_NAME') }} | File</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>File</h1>
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
                            @include('admin.files.table')
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="d-none d-sm-block my-auto text-secondary mr-auto">Displaying {{ $files->count() }} of {{ $files->total() }} records</span>
                                {{ $files->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
