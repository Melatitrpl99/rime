@extends('admin._layouts.app')
<title>{{ env('APP_NAME') }} | Update produk</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Update produk</h1>
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
                        {!! Form::model($product, ['route' => ['admin.products.update', $product], 'method' => 'PATCH', 'class' => 'm-0', 'files' => true]) !!}
                        <div class="card-body">
                            <div class="row">
                                @include('admin.products.fields')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-save"></i>&nbsp; Update
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-default">
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
