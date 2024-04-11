<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SzerVizelo - login</title>
    {{-- @vite('resources/sass/main.scss', 'resources/css/app.css') --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="is-preload">
    @include('includes._menu')
    @yield('content')
    @include('includes._footer')
</body>
</html>
