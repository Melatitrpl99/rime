@extends('layouts.app')
<title>{{ env('APP_NAME') }} | Add new Spending Unit</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Add new Spending Unit</h1>
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
                        {!! Form::open(['route' => 'admin.spending_units.store', 'class' => 'm-0']) !!}
                        <div class="card-body">
                            <div class="row">
                                @include('admin.spending_units.fields')
                            </div>
                        </div>
                        <div class="card-footer">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.spending_units.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection