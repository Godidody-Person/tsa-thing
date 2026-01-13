@extends('layouts.app')

@section('title', 'Resources')

@section('content')
    <h1>{{ $user->name }}</h1>
    <p>Joined {{ $user->created_at->diffForHumans() }}</p>
    <h4>Resources</h4>
    <hr>
    <div class="resources-wrapper">
        <div class="resources">
            @foreach($user->resources as $resource)
                @include('components.resource', ['resource' => $resource])
            @endforeach
        </div>
    </div>
@endsection