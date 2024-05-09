<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($results as $item)
        <span>{{ $item->name }}</span>
        <br>
        <span>{{ $item->major_id }}</span>
        <br>
        <span>{{ $item->city_id }}</span>
        <br>
        <span>{{ $item->region_id }}</span>
        <br>
    @endforeach
</body>

</html>
