<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Community Hub</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    @vite('resources/css/default.css')

    @yield('styles')

    @vite('resources/css/app.css')
</head>
<body>
    @include('components.navbar')
    
    <div class="layout">
        <div class="sidebar">
            @auth
                <a href="">Home</a>
                <a href="">All Resources</a>
                <a href=""><i class="material-symbols-outlined">event_note</i> Programs</a>
                <a href=""><i class="material-symbols-outlined">food_bank</i> Nonprofits</a>
                <a href=""><i class="material-symbols-outlined">event</i> Events</a>
                <a href=""><i class="material-symbols-outlined">golf_course</i> Clubs</a>
            @else
                <h4>Want more features?</h4>
                <p>Save & create resources with a free account.</p>
                <div class="col">
                    <a href="{{ route('register') }}" class="button">Sign up</a>
                    <a href="{{ route('login') }}" class="button clear">Log in</a>
                </div>
            @endauth
        </div>
        <div class="everything">
            @yield('content')
        </div>
    </div>
</body>
</html>