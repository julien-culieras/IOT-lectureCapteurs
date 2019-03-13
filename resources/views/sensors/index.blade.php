<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
</head>
<body>
<div class="flex-center position-ref full-height">
    <ul>
        @foreach($sensors as $sensor)
            <li>
                <a href="{{ route('sensors.show', $sensor) }}">{{ $sensor->address }}</a>
            </li>
        @endforeach
    </ul>

</div>
</body>
</html>