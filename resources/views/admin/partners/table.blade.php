<div class="table-responsive">
    <table class="table" id="partners-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Deskripsi</th>
        <th>Alamat</th>
        <th>Lokasi</th>
        <th>Email</th>
        <th>No Hp</th>
        <th>Slug</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($partners as $partner)
            <tr>
                <td>{{ $partner->nama }}</td>
            <td>{{ $partner->deskripsi }}</td>
            <td>{{ $partner->alamat }}</td>
            <td>{{ $partner->lokasi }}</td>
            <td>{{ $partner->email }}</td>
            <td>{{ $partner->no_hp }}</td>
            <td>{{ $partner->slug }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.partners.destroy', $partner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.partners.show', [$partner->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.partners.edit', [$partner->id]) }}" class='btn btn-default btn-xs'>
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
