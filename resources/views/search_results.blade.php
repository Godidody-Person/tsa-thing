@extends('layouts.app')
@section('content')
    <h1>Search Results</h1>
    <div class="resources-wrapper">
        <div class="resources">
            @forelse($resources as $resource)
                @include('components.resource', ['resource' => $resource])
            @empty
                <p>No resources found</p>
            @endforelse
        </div>
    </div>
@endsection