@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Detail partner</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Detail partner</h1>
                    <a class="btn btn-danger ml-auto" href="{{ route('admin.partners.edit', $partner) }}"><i class="far fa-edit mr-1"></i> Update</a>
                    <a class="btn btn-info ml-2" href="{{ route('admin.partners.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @include('admin.partners.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
