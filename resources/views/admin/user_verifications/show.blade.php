@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Detail verifikasi</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h1>Detail verifikasi</h1>
                    <a class="btn btn-danger ml-auto" href="{{ route('admin.user_verifications.edit', $userVerification) }}"><i class="far fa-edit mr-1"></i> Update</a>
                    <a class="btn btn-info ml-2" href="{{ route('admin.user_verifications.index') }}"><i class="fas fa-angle-double-left mr-1"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.user_verifications.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
