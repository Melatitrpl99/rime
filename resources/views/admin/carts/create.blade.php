@extends('admin._layouts.app')
<title>{{ env('APP_NAME') }} | Tambah keranjang baru</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Tambah keranjang baru</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('adminlte-templates::common.errors')
                </div>
                <div class="col-12">
                    <div class="card">
                        {!! Form::open(['route' => 'admin.carts.store', 'class' => 'm-0']) !!}
                        <div class="card-body">
                            <div class="row">
                                @include('admin.carts.fields')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-save"></i>&nbsp; Simpan
                            </button>
                            <a href="{{ route('admin.carts.index') }}" class="btn btn-default">
                                <i class="fas fa-times-circle"></i>&nbsp; Batal
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
