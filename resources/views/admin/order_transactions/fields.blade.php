<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('order_id', 'Order') !!}
    {!! Form::select('order_id', [], null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Tanggal masuk Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('tanggal_masuk', 'Tanggal masuk') !!}
    {!! Form::text('tanggal_masuk', null, ['class' => 'form-control']) !!}
</div>

@include('layouts.plugins.select2')

@include('layouts.plugins.datetimepicker')

@push('scripts')
    <script>
        $('#waktu_mulai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: false
        });
    </script>
@endpush
