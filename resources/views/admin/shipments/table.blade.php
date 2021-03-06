<table class="table table-hover table-borderless table-striped" id="shipments-table">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th>Order</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->nama_lengkap }}</td>
                <td>{{ Str::limit($shipment->alamat, 50, '...') }}</td>
                <td>{{ $shipment->kode_pos }}</td>
                <td>{{ Str::limit($shipment->catatan, 50, '...') }}</td>
                <td>{{ $shipment->order->nomor }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.shipments.destroy', $shipment], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.shipments.show', $shipment) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.shipments.edit', $shipment) }}" class="btn btn-default btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
