<table class="table table-hover table-borderless table-striped" id="partners-table" style="min-width: 1024px">
    <thead>
        <tr>
            <th widht="50">#</th>
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
                <td>
                    {{ $partners->perPage() * ($partners->currentPage() - 1) + $loop->iteration }}
                </td>
                <td>{{ $partner->nama }}</td>
                <td>{{ $partner->lokasi }}</td>
                <td>{{ $partner->email }}</td>
                <td>{{ $partner->no_hp }}</td>
                <td>{{ $partner->slug }}</td>
                <td>
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
