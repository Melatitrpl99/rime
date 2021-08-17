<table class="table table-hover table-borderless table-striped" id="shipments-table">
    <thead>
        <tr>
            <th>Alamat</th>
            <th>Desa/Kelurahan</th>
            <th>Kode Pos</th>
            <th>User</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($shipments as $shipment)
        <tr>
            <td>{{ $shipment->alamat }}</td>
            <td>{{ $shipment->village->name }}</td>
            <td>{{ $shipment->kode_pos }}</td>
            <td>{{ $shipment->user->name }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.shipments.destroy', $shipment], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.shipments.show', [$shipment]) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.shipments.edit', [$shipment]) }}" class='btn btn-default btn-sm'>
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