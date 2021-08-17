<!-- User Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-12">
    {!! Form::label('alamat', 'Alamat') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('province_id', 'Provinsi') !!}
    {!! Form::select('province_id', $provinceItems, null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Regency Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('regency_id', 'Kota/Kabupaten') !!}
    {!! Form::select('regency_id', [], null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('district_id', 'Kecamatan') !!}
    {!! Form::select('district_id', [], null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Village Id Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('village_id', 'Desa/Kelurahan') !!}
    {!! Form::select('village_id', [], null, ['class' => 'form-control select2-dropdown', 'style' => 'width: 100%']) !!}
</div>

<!-- Kode Pos Field -->
<div class="form-group col-12 col-sm-6">
    {!! Form::label('kode_pos', 'Kode Pos:') !!}
    {!! Form::text('kode_pos', null, ['class' => 'form-control']) !!}
</div>

<!-- Catatan Field -->
<div class="form-group col-12">
    {!! Form::label('catatan', 'Catatan:') !!}
    {!! Form::textarea('catatan', null, ['class' => 'form-control']) !!}
</div>

@include('layouts.plugins.select2')

@push('scripts')
    <script>
        $('#province_id').on('select2:select', function () {
            $.ajax({
                url: "{{ route('region.regency') }}",
                type: 'get',
                data: {
                    province_id: $(this).find(':selected').val()
                },
                success: function (response) {
                    $('#regency_id').empty();
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value, key, false, false);
                        $('#regency_id').append(option).trigger('change');
                    }
                },
                error: function (response) {

                }
            });
        });

        $('#regency_id').on('select2:select', function () {
            $.ajax({
                url: "{{ route('region.district') }}",
                type: 'get',
                data: {
                    regency_id: $(this).find(':selected').val()
                },
                success: function (response) {
                    $('#district_id').empty();
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value, key, false, false);
                        $('#district_id').append(option).trigger('change');
                    }
                },
                error: function (response) {

                }
            });
        });

        $('#district_id').on('select2:select', function () {
            $.ajax({
                url: "{{ route('region.village') }}",
                type: 'get',
                data: {
                    district_id: $(this).find(':selected').val()
                },
                success: function (response) {
                    $('#village_id').empty();
                    for (let [key, value] of Object.entries(response)) {
                        const option = new Option(value, key, false, false);
                        $('#village_id').append(option).trigger('change');
                    }
                },
                error: function (response) {

                }
            });
        });
    </script>
@endpush
