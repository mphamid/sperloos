<!DOCTYPE html>
<html>
<head>
    <title>Posts list</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    @include('layouts.navigation')
    <h1>All the posts</h1>
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>image</td>
            <td>title</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td><img src="{{ asset('storage/100x100_'.$post->thumbnail) }}" alt=""></td>
                <td>{{ $post->title }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ route('post.show',['post'=>$post->id]) }}">Show this post</a>
                    <a class="btn btn-small btn-info" href="{{ route('post.edit',['post'=>$post->id]) }}">Edit this post</a>
                    <form action="{{ route('post.destroy',['post'=>$post->id]) }}" method="post">@csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-small btn-danger">Delete this post</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
