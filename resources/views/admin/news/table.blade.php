<div class="table-responsive">
    <table class="table" id="news-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Konten</th>
        <th>Slug</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($news as $news)
            <tr>
                <td>{{ $news->judul }}</td>
            <td>{{ $news->konten }}</td>
            <td>{{ $news->slug }}</td>
            <td>{{ $news->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.news.destroy', $news->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.news.show', [$news->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.news.edit', [$news->id]) }}" class='btn btn-default btn-xs'>
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
