<div class="navbar">
    <div class="first-col">
        <a href="{{ route('home') }}"><strong>Home</strong></a>
        <a href="{{ route('resources') }}">Resources</a>
        <a href="{{ route('resources') }}">New</a>
        <a href="{{ route('resources') }}">Trending</a>
        <a href="{{ route('resources') }}">About</a>
    </div>

    @auth
        <div class="col background">
            <a href="{{ route('app.settings') }}" class="button mono"><i class="material-symbols-outlined">settings</i></a>
            <a href="{{ route('app.create') }}" class="button">Create <i class="material-symbols-outlined">add</i></a>
            <a href="{{ route('app.home') }}" class="button" aria-label="Home"><i class="material-symbols-outlined">home</i> Home</a>
            <form action="{{ route('logout') }}" method="post" style="height:fit-content">
                @csrf
                <button class="clear">Logout</button>
            </form>
        </div>
    @else
        <div class="col background">
            <a href="{{ route('register') }}" class="button">Register</a>
            <a href="{{ route('login') }}" class="button clear">Login</a>
        </div>
    @endauth
</div>