<!DOCTYPE html>
<html>
<head>
    <title>Show Single Post</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    @include('layouts.navigation')
    <h1>Showing Blog Post</h1>
    <div class="jumbotron text-center">
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset('storage/100x100_'.$post->thumbnail) }}" alt="">
        <p>
            {!! $post->content !!}
        </p>
    </div>
</div>
</body>
</html>
