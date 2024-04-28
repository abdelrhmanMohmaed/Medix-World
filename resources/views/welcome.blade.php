<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <span>
            Landing page
            @if (!Auth::user())
            <br>
            <a href="{{route("website.login")}}">login</a>
            <br>
            <a href="{{route("website.register")}}">regster</a>
            @else
            <br>
                
            <a href="{{route("website.profile.index")}}">profile</a>
            <br>
            <a href="{{route("website.logout")}}">logout</a>
            @endif
        </span>

    </body>
</html>
