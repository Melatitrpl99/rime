<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Konten Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('konten', 'Konten:') !!}
    {!! Form::textarea('konten', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_category_id', 'Post Category Id:') !!}
    {!! Form::select('post_category_id', $post_categoryItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $userItems, null, ['class' => 'form-control custom-select']) !!}
</div>
