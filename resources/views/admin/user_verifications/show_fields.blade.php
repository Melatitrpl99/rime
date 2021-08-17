<!-- User Id Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">User Id:</div>
    <div class="col-12 col-md-9">{{ $userVerification->user_id }}</div>
</div>

<!-- Result Token Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Result Token:</div>
    <div class="col-12 col-md-9">{{ $userVerification->result_token }}</div>
</div>

<!-- Similarity Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Similarity:</div>
    <div class="col-12 col-md-9">{{ $userVerification->similarity }}</div>
</div>

<!-- Accuracy Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Accuracy:</div>
    <div class="col-12 col-md-9">{{ $userVerification->accuracy }}</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Created At:</div>
    <div class="col-12 col-md-9">{{ $userVerification->created_at }}</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Updated At:</div>
    <div class="col-12 col-md-9">{{ $userVerification->updated_at }}</div>
</div>

