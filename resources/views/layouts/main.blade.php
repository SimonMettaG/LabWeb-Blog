<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blogger</title>
</head>
<body>
    @auth
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1" style="margin-left: 30px">Blogger :)</span>
            <div class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ route('blog.home') }}">Home</a>
            </div>
            <div class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ route('blog.feed') }}">Feed</a>
            </div>
            <div class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ route('blog.followers') }}">Followers</a>
            </div>
            <div class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ route('blog.settings') }}">Settings</a>
            </div>
            <div class="navbar-nav mr-auto">
                <form action="{{ route('user.redisearch') }}" method="GET" class="form-inline">
                    <input type="text" name="user" placeholder="Search a user..." style="margin-right: 10px">
                    <button class="btn btn-light"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/1200px-Magnifying_glass_icon.svg.png" height="15" width="15"></button>
                </form>
            </div>
            <form class="form-inline" action="{{ route('auth.logout') }}" method="POST" style="margin-right: 30px">
                @csrf
                <a href="/user/{{ auth()->user()->username }}">
                    <img src="{{ auth()->user()->img }}" width="30" height="30" style="border: 3px black solid; border-radius: 3px">
                </a>
                <span class="navbar-brand mb-0 h2" style="margin-right: 30px; margin-left: 30px">{{ auth()->user()->username }}</span>
                <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </nav>
        <br>
    @endauth

    @yield('content')
</body>
</html>
