<table class="table table-hover table-borderless table-striped" id="shipments-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th width="50">#</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th>User</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($userShipments as $userShipment)
        <tr>
            <td>
                {{ $userShipments->perPage() * ($userShipments->currentPage() - 1) + $loop->iteration }}
            </td>
            <td>{{ $userShipment->alamat }}</td>
            <td>{{ $userShipment->kode_pos }}</td>
            <td>{{ $userShipment->user->nama_lengkap }}</td>
            <td width="120">
                {!! Form::open(['route' => ['admin.user_shipments.destroy', $userShipment], 'method' => 'DELETE', 'class' => 'm-0']) !!}
                <div class="btn-group">
                    <a href="{{ route('admin.user_shipments.show', $userShipment) }}" class="btn btn-default btn-sm">
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.user_shipments.edit', $userShipment) }}" class="btn btn-default btn-sm">
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