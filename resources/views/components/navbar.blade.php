<div class="navbar">
    <div class="first-col">
        <a href="{{ route('home') }}"><strong>Home</strong></a>
        <a href="{{ route('resources') }}">Events</a>
    </div>

    @auth
        <div class="col background">
            <a href="{{ route('app.settings') }}" class="button mono"><i class="material-symbols-outlined">settings</i></a>
            <a href="{{ route('app.home') }}" class="button" aria-label="Home"><i class="material-symbols-outlined">home</i> Home</a>
            <a href="{{ route('logout') }}" class="button clear">Logout</a>
        </div>
    @else
        <div class="col background">
            <a href="{{ route('register') }}" class="button">Register</a>
            <a href="{{ route('login') }}" class="button clear">Login</a>
        </div>
    @endauth
</div>