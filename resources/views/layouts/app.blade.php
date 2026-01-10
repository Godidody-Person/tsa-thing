<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Community Hub</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite('resources/css/default.css')

    @yield('styles')
</head>
<body>
    @include('components.navbar')
    
    @yield('content')
</body>
</html>