@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Additional Cost</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($additionalCost, ['route' => ['admin.additionalCosts.update', $additionalCost->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.additional_costs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.additionalCosts.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
