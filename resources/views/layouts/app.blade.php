<html>
<head>
    <title>@yield('title') - Gestion des capteurs</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.3.0/dist/sweetalert2.min.css">
</head>
<body>
<nav style="background-color: #1b4b72">
    <ul style="list-style: none; display: flex">
        <li style="margin: 10px">
            <a style="color: #fff" href="{{ route('raspberry.index') }}">Raspberry</a>
        </li>
        <li style="margin: 10px">
            <a style="color: #fff" href="{{ route('sensors.index') }}">Capteurs</a>
        </li>
        <li style="margin: 10px">
            <a style="color: #fff" href="{{ route('types.index') }}">Types</a>
        </li>
    </ul>
</nav>
<div class="container">
    @include('flash::message')
    @yield('content')
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@yield('javascript')
</body>
</html>