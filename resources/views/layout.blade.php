<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web App</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-brand">
                <a href="/">Plannr</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                <li><a href="{{ route('posts.create') }}">New post</a></li>
                <li><a href="#">Log Out</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        @include('partials._messages')
        @yield('content')
    </div>

</body>
</html>