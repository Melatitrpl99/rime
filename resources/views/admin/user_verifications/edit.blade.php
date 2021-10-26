@extends('admin._layouts.app')
    <title>{{ env('APP_NAME') }} | Update data verifikasi identitas user</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Update data verifikasi identitas user</h1>
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
                        {!! Form::model($userVerification, ['route' => ['admin.user_verifications.update', $userVerification], 'method' => 'PATCH', 'class' => 'm-0']) !!}
                        <div class="card-body">
                            <div class="row">
                                @include('admin.user_verifications.fields')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                            <a href="{{ route('admin.user_verifications.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
