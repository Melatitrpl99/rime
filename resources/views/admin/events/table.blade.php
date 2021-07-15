<table class="table table-hover table-borderless table-striped" id="events-table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Waktu Mulai / Berakhir</th>
            <th>Alamat</th>
            <th>Nomor Hp</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->judul }}</td>
                <td>{{ $event->waktu_mulai->format('d F Y') }} / {{ $event->waktu_berakhir->format('d F Y') }}</td>
                <td>{{ $event->alamat }}</td>
                <td>{{ $event->nomor_hp }}</td>
                <td>{{ $event->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.events.destroy', $event], 'method' => 'delete', 'class' => 'm-0']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.events.show', $event) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-default btn-sm">
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
