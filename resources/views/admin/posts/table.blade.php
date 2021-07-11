<div class="table-responsive">
    <table class="table" id="posts-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Konten</th>
        <th>Post Category Id</th>
        <th>Slug</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->judul }}</td>
            <td>{{ $post->konten }}</td>
            <td>{{ $post->post_category_id }}</td>
            <td>{{ $post->slug }}</td>
            <td>{{ $post->user_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.posts.show', [$post->id]) }}" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.posts.edit', [$post->id]) }}" class='btn btn-default btn-sm'>
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
