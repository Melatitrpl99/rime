@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Add new Partner</h1>
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
                    {!! Form::open(['route' => 'admin.partners.store', 'class' => 'm-0']) !!}
                    <div class="card-body">
                        <div class="row">
                            @include('admin.partners.fields')
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('admin.partners.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
