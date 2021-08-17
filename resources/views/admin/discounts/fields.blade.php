<!-- Judul Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Deskripsi Field -->
<div class="form-group col-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Kode Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    <div class="input-group">
        {!! Form::text('kode', null, ['class' => 'form-control']) !!}
        <div class="input-group-append">
            <button class="btn btn-info" type="button" id="random_discount_code">
                Buat Kode Random
            </button>
        </div>
    </div>
</div>

<!-- Batas Pemakaian Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('batas_pemakaian', 'Batas Pemakaian:') !!}
    {!! Form::number('batas_pemakaian', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Mulai Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_mulai', 'Waktu Mulai:') !!}
    {!! Form::text('waktu_mulai', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_mulai', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_mulai', 'autocomplete' => 'off']) !!}
</div>

<!-- Waktu Berakhir Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('waktu_berakhir', 'Waktu Berakhir:') !!}
    {!! Form::text('waktu_berakhir', null, ['class' => 'form-control datetimepicker-input', 'id' => 'waktu_berakhir', 'data-target-input' => 'nearest', 'data-toggle' => 'datetimepicker', 'data-target' => '#waktu_berakhir', 'autocomplete' => 'off']) !!}
</div>

@include('admin.discounts.table_fields')

@include('layouts.plugins.datetimepicker')

@once
    @push('scripts')
    <script>
        function generateRandomString(length = 8) {
            const upper = [..."ABCDEFGHIJKLMNOPQRSTUVWXYZ"];
            const lower = [..."abcdefghijklmnopqrstuvwxyz"];
            const unique = [..."+="];
            const nums = [..."0123456789"];

            const base = [...upper, ...lower, ...nums, ...unique];

            const generator = (base, len) => {
                return [...Array(len)]
                    .map(i => base[Math.random() * base.length|0])
                    .join('');
            };

            return generator(base, length);
        }
        $('#random_discount_code').on('click', function () {
            value = generateRandomString();
            $('#kode').val(value);
        });

        $('#waktu_mulai').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: false
        });

        $('#waktu_berakhir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: false
        });
    </script>
    @endpush
@endonce
