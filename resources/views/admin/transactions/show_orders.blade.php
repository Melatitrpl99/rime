@foreach ($transaction->orders as $order)
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title"><h4>{{ $order->nomor }}</h4></div>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @include('admin.orders.show_fields')
        </div>
        <div class="card-body p-0 table-responsive">
            @include('admin.orders.table_details')
        </div>
    </div>
</div>
@endforeach