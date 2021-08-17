@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Testimoni</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Testimoni</h1>
                    <a href="{{ route('admin.testimonies.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus mr-1"></i> Tambah baru
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
                            @include('admin.testimonies.table')
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items center">
                                <span class="d-block my-auto text-secondary">Displaying {{ $testimonies->count() }} of {{ $testimonies->total() }} records</span>
                                {{ $testimonies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
