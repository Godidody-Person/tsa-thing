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

    <script>
        function toggleFloating(id) {
            document.getElementById(id).style.visibility = document.getElementById(id).style.visibility == 'visible' ? 'hidden' : 'visible';
            document.getElementById(id).style.opacity = document.getElementById(id).style.opacity == '1' ? '0' : '1';
        }
    </script>
</head>
<body>
    @include('components.navbar')
    
    <div class="layout">
        <div class="sidebar">
            <button class="normal see-more" aria-label="expand navigation sidebar"><i class="material-symbols-outlined">read_more</i></button>
            @auth
                <a href="{{ route('app.home') }}"><i class="material-symbols-outlined">home</i> <span>Home</span></a>
                <a href="{{ route('resources') }}"><i class="material-symbols-outlined">view_cozy</i> <span>All Resources</span></a>
                <a href="{{ route('programs') }}"><i class="material-symbols-outlined">event_note</i> <span>Programs</span></a>
                <a href="{{ route('nonprofits') }}"><i class="material-symbols-outlined">food_bank</i> <span>Nonprofits</span></a>
                <a href="{{ route('events') }}"><i class="material-symbols-outlined">event</i> <span>Events</span></a>
                <a href="{{ route('clubs') }}"><i class="material-symbols-outlined">golf_course</i> <span>Clubs</span></a>

                <hr>

                <a href="{{ route('app.resources') }}"><i class="material-symbols-outlined">apps</i> <span>Your Resources</span></a>
                <a href="{{ route('app.profile', auth()->user()->id) }}"><i class="material-symbols-outlined">account_circle</i> <span>Profile</span></a>
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