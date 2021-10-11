<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('welcome') }}">home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ route('post.index') }}">View All posts</a></li>
        <li><a href="{{ route('post.create') }}">Create a posts</a>
        <li><a href="{{ route('logout') }}">logout</a>
    </ul>
</nav>
