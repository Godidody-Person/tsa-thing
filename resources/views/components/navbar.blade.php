<button class="toggle-navbar" aria-label="open navigation menu" onclick="document.getElementById('navbar').style.display=document.getElementById('navbar').style.display == 'flex' ? 'none' : 'flex';">
    <i class="material-symbols-outlined">menu</i>
</button>
<div class="navbar" id="navbar">
    <div class="first-col">
        <a href="{{ route('home') }}"><strong>Home</strong></a>
        <a href="{{ route('resources') }}">Resources</a>
        <form action="{{ route('search') }}" method="get">
            <div class="col input">
                <input type="text" name="search" placeholder="Search">
                <button type="submit" aria-label="Search"><i class="material-symbols-outlined">search</i></button>
            </div>
        </form>
    </div>

    @auth
        <div class="col background">
            <a href="{{ route('app.settings') }}" class="button mono"><i class="material-symbols-outlined">settings</i></a>
            <a href="{{ route('app.createPage') }}" class="button">Create <i class="material-symbols-outlined">add</i></a>
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