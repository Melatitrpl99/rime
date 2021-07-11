<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Deskripsi</th>
        <th>Waktu Mulai</th>
        <th>Waktu Berakhir</th>
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
            <td>{{ $event->deskripsi }}</td>
            <td>{{ $event->waktu_mulai }}</td>
            <td>{{ $event->waktu_berakhir }}</td>
            <td>{{ $event->alamat }}</td>
            <td>{{ $event->nomor_hp }}</td>
            <td>{{ $event->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.events.destroy', $event->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.events.show', [$event->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.events.edit', [$event->id]) }}" class='btn btn-default btn-sm'>
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
</div>
