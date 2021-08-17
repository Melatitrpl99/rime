<table class="table table-hover table-borderless table-striped" id="partners-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Lokasi</th>
            <th>Email</th>
            <th>No Hp</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($partners as $partner)
            <tr>
                <td>{{ $partner->nama }}</td>
                <td>{{ $partner->lokasi }}</td>
                <td>{{ $partner->email }}</td>
                <td>{{ $partner->no_hp }}</td>
                <td>{{ $partner->slug }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.partners.destroy', $partner], 'method' => 'DELETE']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.partners.show', $partner) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-default btn-sm">
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
