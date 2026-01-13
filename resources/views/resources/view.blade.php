@extends('layouts.app')

@section('title', 'Resources')

@section('styles')
    <style>
        .banner-image{
            width: 100%;
            height: 300px;

            box-sizing: border-box;

            object-fit: cover;

            border-radius: var(--br);
        }

        .banner-panel {
            padding: 20px;
            border-radius: var(--br);

            transform: translateY(-100%);
            
            width: 100%;

            box-sizing: border-box;

            border:none !important;
            background: linear-gradient(0deg, black, rgba(0,0,0,0));

            align-items:flex-start;

            padding-left:40px;
        }

        .banner-panel h1,
        .banner-panel p {
            color: white;
        }

        .banner{
            position: relative;
            height: 300px;
        }

        @media(max-width: 400px){
            .everything > div{
                width: calc(100% - 40px);
                box-sizing: border-box;
            }
        }
    </style>

@endsection

@section('content')
<script>
    function share() {
        toggleFloating('share');
    }

    function addToFavorites(url, title) {
        if (window.sidebar && window.sidebar.addPanel) {
            // Old Firefox
            window.sidebar.addPanel(title, url, '');
        } else if (window.external && 'AddFavorite' in window.external) {
            // Internet Explorer
            window.external.AddFavorite(url, title);
        } else {
            alert('Press Ctrl+D (or Cmd+D on Mac) to add this page to your favorites.');
        }
    }

</script>
    <div class="banner">
        <img src="{{ asset('storage/' . $resource->image_path) }}" alt="{{ $resource->name }}" class="banner-image">

        <div class="panel banner-panel">
            <h1>{{ $resource->name }}</h1>
            <p style='max-width:100%; white-space:nowrap; overflow: hidden; text-overflow:ellipsis'>{{ $resource->description }}</p>
            @auth
                @if($resource->creator_id === auth()->user()->id)
                    <div class="col">
                        <a href="{{ route('app.resource.edit', $resource->id) }}" class="button">Edit</a>
                        <form action="{{ route('app.resource.delete', $resource->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this resource?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button normal">Delete</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>

    <hr>

    <div class="panel left">
        <div class="col">
            <button onclick="addToFavorites('{{ route('resource.view', $resource->id) }}', '{{ $resource->name }}')" class="normal"><i class="material-symbols-outlined">bookmark</i> Save</button>
            <button onclick="share()" class="normal"><i class="material-symbols-outlined">share</i> Share</button>
        </div>
        <h2>Resource Details</h2>
        <p class="pill">{{ $resource->type }}</p>
        <p class="faint">Creator: <a href="{{ route('app.profile', $resource->creator->id) }}">{{ $resource->creator->name }}</a></p>
        <p class="faint">Created at: {{ $resource->created_at->format('Y-m-d H:i:s') }}</p>
        <hr>
        <p>{{ $resource->description }}</p>
    </div>

    <div class="floating" id="share">
        <div class="panel">
            <button onclick="toggleFloating('share')" class="close clear"><i class="material-symbols-outlined">close</i></button>
            <h2>Share Resource</h2>
            <p>Copy the link below to share this resource with others.</p>
            <input type="text" value="{{ route('resource.view', $resource->id) }}">
        </div>
    </div>
@endsection