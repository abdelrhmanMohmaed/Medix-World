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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('dashboard.name-en') }}</th>
                <th scope="col">{{ __('dashboard.name-ar') }}</th>
                <th scope="col">{{ __('dashboard.name-' . app()->getLocale()) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->getTranslation('name', 'en') }}</td>
                    <td>{{ $item->getTranslation('name', 'ar') }}</td>
                    <td>{{ $item->city->getTranslation('name', app()->getLocale()) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
