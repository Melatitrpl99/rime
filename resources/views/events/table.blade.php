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
        @foreach($events as $events)
            <tr>
                <td>{{ $events->judul }}</td>
            <td>{{ $events->deskripsi }}</td>
            <td>{{ $events->waktu_mulai }}</td>
            <td>{{ $events->waktu_berakhir }}</td>
            <td>{{ $events->alamat }}</td>
            <td>{{ $events->nomor_hp }}</td>
            <td>{{ $events->email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['events.destroy', $events->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('events.show', [$events->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('events.edit', [$events->id]) }}" class='btn btn-default btn-xs'>
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
