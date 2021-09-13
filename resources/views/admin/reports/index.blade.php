@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Arsip laporan</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between aligh-items-center">
                    <h1>Arsip laporan</h1>
                    <a href="{{ route('admin.reports.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Tambah baru</span>
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
                            @include('admin.reports.table')
                        </div>
                        <div class="card-footer">
                            <span class="d-none d-sm-block my-auto text-secondary mr-auto">Displaying {{ $reports->count() }} of {{ $reports->total() }} records</span>
                            {{ $reports->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
