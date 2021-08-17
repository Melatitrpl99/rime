@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Update user</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Update user</h1>
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
                        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PATCH', 'class' => 'm-0', 'files' => true]) !!}
                        <div class="card-body">
                            <div class="row">
                                @include('admin.users.fields')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-save"></i>&nbsp; Update
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-default">
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
