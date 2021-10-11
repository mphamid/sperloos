<!DOCTYPE html>
<html>
<head>
    <title>edit post</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    @include('layouts.navigation')
    <h1>edit a post</h1>
    @foreach($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
    <form action="{{route('post.update',['post'=>$post->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <textarea name="content_text" id="content" class="form-control">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="thumbnail">thumbnail</label>
            <input type="text" id="thumbnail" name="thumbnail" class="form-control" value="{{$post->thumbnail}}">
        </div>
        <button class="btn btn-small btn-success">Edit post</button>
    </form>
</div>
</body>
</html>
