@extends('layouts.app')

@section('title', 'Resources')

@section('content')
    <h1>Resources</h1>
    <h4>New</h4>
    <div class="pane">
        <div class="resources-wrapper">
            <div class="resources">
                @forelse($new as $resource)
                    @include('components.resource', ['resource' => $resource])
                @empty
                    <p>No resources found</p>
                @endforelse
            </div>
        </div>
    </div>
    <h4>Programs</h4>
    <div class="resources-wrapper">
        <div class="resources">
            @forelse($programs as $resource)
                @include('components.resource', ['resource' => $resource])
            @empty
                <p>No resources found</p>
            @endforelse
        </div>
    </div>
    <h4>Events</h4>
    <div class="resources-wrapper">
        <div class="resources">
            @forelse($events as $resource)
                @include('components.resource', ['resource' => $resource])
            @empty
                <p>No resources found</p>
            @endforelse
        </div>
    </div>
    <h4>Nonprofits</h4>
    <div class="resources-wrapper">
        <div class="resources">
            @forelse($nonprofits as $resource)
                @include('components.resource', ['resource' => $resource])
            @empty
                <p>No resources found</p>
            @endforelse
        </div>
    </div>
    <h4>Clubs</h4>
    <div class="resources-wrapper">
        <div class="resources">
            @forelse($clubs as $resource)
                @include('components.resource', ['resource' => $resource])
            @empty
                <p>No resources found</p>
            @endforelse
        </div>
    </div>
@endsection