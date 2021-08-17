<table class="table table-hover table-borderless table-striped" id="posts-table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Konten</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->judul }}</td>
                <td>{{ $post->konten }}</td>
                <td>{{ $post->postCategory->name }}</td>
                <td>{{ $post->user->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.posts.destroy', $post], 'method' => 'DELETE']) !!}
                    <div class="btn-group">
                        <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-default btn-sm">
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
