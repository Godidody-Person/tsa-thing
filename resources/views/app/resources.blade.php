@extends('layouts.app')

@section('title', 'Resources')

@section('content')
    <h1>Your Resources</h1>
    <div class="col">
        <a href="{{ route('app.create') }}" class="button">Create a resource</a>
    </div>
    <hr>
    <div class="resources-wrapper">
        <div class="resources">
            @forelse(auth()->user()->resources as $resource)
                @include('components.resource', ['resource' => $resource])
            @empty
                <p>No resources found.</p>
            @endforelse
        </div>
    </div>
@endsection