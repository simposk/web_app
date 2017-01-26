<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-brand">
                <a href="/">Plannr</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check()) 
                    {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
                        <div class="links">
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                            <li><a href="{{ route('posts.create') }}">New post</a></li>
                            <li><a><button type="submit" class="logout">Logout</button></a></li>
                        </div>
                    {!! Form::close() !!}
                @else
                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>