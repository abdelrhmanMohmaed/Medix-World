<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


    </head>
    <body class="antialiased">
        <h1>Service Dashboard</h1>
        @if (!Auth::guard('service_provider')->user())
        <br>
        <a href="{{route("services.login")}}">login</a>
        <br>
        <a href="{{route("services.register")}}">regster</a>
        @else
        <br>
            
        <a href="{{route("services.profile.index")}}">profile</a>
        <br>
        <a href="{{route("services.logout")}}">logout</a>
        @endif
    </body>
</html>
