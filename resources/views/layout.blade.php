<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web App</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('partials._header')
    
    <div class="container">
        @include('partials._messages')
        @yield('content')
    </div>

</body>
</html>