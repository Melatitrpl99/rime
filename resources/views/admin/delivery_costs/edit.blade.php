@extends('layouts.app')
    <title>{{ env('APP_NAME') }} | Update Delivery Cost</title>

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Update Delivery Cost</h1>
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
                        {!! Form::model($deliveryCost, ['route' => ['admin.delivery_costs.update', $deliveryCost], 'method' => 'PATCH', 'class' => 'm-0']) !!}
                        <div class="card-body">
                            <div class="row">
                                @include('admin.delivery_costs.fields')
                            </div>
                        </div>
                        <div class="card-footer">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.delivery_costs.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
