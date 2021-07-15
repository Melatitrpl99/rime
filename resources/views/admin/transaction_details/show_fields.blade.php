<!-- Subtotal Field -->
<div class="form-group row">
    <div class="col-12 col-md-3 text-bold">Sub Total</div>
    <div class="col-12 col-md-9">{{ $transactionDetail->sub_total }}</div>
</div>

<div class="row">
    <a class="btn btn-default" href="{{ route('admin.transaction_details.index') }}">Back</a>
</div>
