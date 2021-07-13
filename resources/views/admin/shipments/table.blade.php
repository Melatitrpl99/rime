<div class="table-responsive">
    <table class="table" id="shipments-table">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>No</th>
        <th>Rt</th>
        <th>Rw</th>
        <th>Village Id</th>
        <th>Kode Pos</th>
        <th>Catatan</th>
        <th>Order Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->nama_lengkap }}</td>
            <td>{{ $shipment->alamat }}</td>
            <td>{{ $shipment->no }}</td>
            <td>{{ $shipment->rt }}</td>
            <td>{{ $shipment->rw }}</td>
            <td>{{ $shipment->village_id }}</td>
            <td>{{ $shipment->kode_pos }}</td>
            <td>{{ $shipment->catatan }}</td>
            <td>{{ $shipment->order_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.shipments.destroy', $shipment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.shipments.show', [$shipment->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.shipments.edit', [$shipment->id]) }}" class='btn btn-default btn-xs'>
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
