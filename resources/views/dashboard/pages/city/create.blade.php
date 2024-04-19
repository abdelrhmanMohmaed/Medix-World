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
    <form action="{{ route('cities.store', app()->getLocale()) }}" method="post">
        @csrf
        <label for="name_en">{{__("dashboard.name-en")}}</label>
        <input type="text" name="name[en]" id="name_en">
        <label for="name_ar">{{__("dashboard.name-ar")}}</label>
        <input type="text" name="name[ar]" id="name_ar">

        <button type="submit">{{ __('dashboard.submit') }}</button>
    </form>

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
</body>

</html>
