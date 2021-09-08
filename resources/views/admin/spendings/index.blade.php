@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Pengeluaran</title>

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Pengeluaran</h1>
                <a href="{{ route('admin.spendings.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i> Tambah baru
                </a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card">
            <div class="card-body p-0 table-responsive">
                @include('admin.spendings.table')
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="d-none d-sm-block my-auto text-secondary mr-auto">Displaying {{ $spendings->count() }} of {{ $spendings->total() }} records</span>
                    {{ $spendings->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
