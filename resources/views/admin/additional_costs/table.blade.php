<div class="table-responsive">
    <table class="table" id="additionalCosts-table">
        <thead>
            <tr>
                <th>Tanggal</th>
        <th>Nomor</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Total</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($additionalCosts as $additionalCost)
            <tr>
                <td>{{ $additionalCost->tanggal }}</td>
            <td>{{ $additionalCost->nomor }}</td>
            <td>{{ $additionalCost->nama }}</td>
            <td>{{ $additionalCost->deskripsi }}</td>
            <td>{{ $additionalCost->total }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.additionalCosts.destroy', $additionalCost->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.additionalCosts.show', [$additionalCost->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.additionalCosts.edit', [$additionalCost->id]) }}" class='btn btn-default btn-xs'>
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
