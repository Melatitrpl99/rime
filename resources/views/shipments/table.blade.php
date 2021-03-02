<div class="table-responsive">
    <table class="table" id="shipments-table">
        <thead>
            <tr>
                <th>Order Id</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Alamat Manual</th>
        <th>Kode Pos</th>
        <th>Rt</th>
        <th>Rw</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->order_id }}</td>
            <td>{{ $shipment->nama_lengkap }}</td>
            <td>{{ $shipment->alamat }}</td>
            <td>{{ $shipment->alamat_manual }}</td>
            <td>{{ $shipment->kode_pos }}</td>
            <td>{{ $shipment->rt }}</td>
            <td>{{ $shipment->rw }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shipments.destroy', $shipment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shipments.show', [$shipment->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shipments.edit', [$shipment->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
