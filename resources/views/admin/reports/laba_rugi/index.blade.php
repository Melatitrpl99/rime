@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Laporan Laba Rugi</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between aligh-items-center">
                    <h1 class="mr-auto">Laporan Laba Rugi</h1>
                    <div class="dropdown menu-right mr-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-export mr-sm-1"></i>
                            <span class="d-none d-sm-inline">Ekspor</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" id="rime">File Dokumen (.PDF)</a>
                            <a class="dropdown-item" href="#">File Excel (.XLS)</a>
                            <a class="dropdown-item" href="#">File CSV</a>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-save mr-sm-1"></i>
                        <span class="d-none d-sm-inline">Simpan</span>
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
                            @include('admin.reports.laba_rugi.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('#rime').click(() => {
            window.print();
        })
    </script>
@endpush
