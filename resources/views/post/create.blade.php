<!DOCTYPE html>
<html>
<head>
    <title>create post</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    @include('layouts.navigation')
    <h1>Create a post</h1>
    @foreach($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <textarea name="content_text" id="content" class="form-control">{{old('content_text')}}</textarea>
        </div>
        <div class="form-group">
            <label for="thumbnail">thumbnail</label>
            <input type="text" id="thumbnail" name="thumbnail" class="form-control" value="{{old('thumbnail')}}">
        </div>
        <button class="btn btn-small btn-success">Store post</button>
    </form>
</div>
</body>
</html>
