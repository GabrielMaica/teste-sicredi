<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')Teste Sicredi</title>

            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>header default</header>
    @yield('content')
    <footer>footer default</footer>
</body>
</html>