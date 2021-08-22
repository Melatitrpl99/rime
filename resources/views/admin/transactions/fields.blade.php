<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('order_id', 'Order') !!}
    {!! Form::select('order_id', array(), null, ['class' => 'form-control select2-dropdown']) !!}
</div>

<!-- Tanggal masuk Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('tanggal_masuk', 'Tanggal masuk') !!}
    {!! Form::text('tanggal_masuk', null, ['class' => 'form-control datetimepicker-input', 'id' => 'tanggal_masuk', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#tanggal_masuk', 'autocomplete' => 'off']) !!}
</div>

@include('layouts.plugins.select2')

@include('layouts.plugins.datetimepicker')

@push('scripts')
<script>
    $('#tanggal_masuk').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: false
        });
    </script>

@endpush