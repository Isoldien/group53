<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUZOO</title>

    {{-- Vite CSS + JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- NAVBAR --}}
    @include('components.navbar')

    {{-- CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('components.footer')

</body>
</html>

