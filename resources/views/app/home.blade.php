@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome Back, {{ auth()->user()->name }}!</h1>
    <h2>What the community's up to</h2>
    
    <div class="resources-wrapper">
        <div class="resources">
            <div class="resource">
                <img src="{{ asset('media/cafe.jpg') }}" alt="Cafe Cover Image">
                <div class="resource-info">
                    <h4>Recent Resources</h4>
                    <p class="faint">New resources in your community</p>
                </div>

                <div class="floating-resource">
                    <a href="{{ route('resources') }}" class="button small">View</a>
                </div>
            </div>

            <div class="resource">
                <img src="{{ asset('media/clouds.jpg') }}" alt="Cafe Cover Image">
                <div class="resource-info">
                    <h4>Events</h4>
                    <p class="faint">Events to attend in your community</p>
                </div>

                <div class="floating-resource">
                    <a href="{{ route('events') }}" class="button small">View</a>
                </div>
            </div>

            <div class="resource">
                <img src="{{ asset('media/flowers.jpg') }}" alt="Cafe Cover Image">
                <div class="resource-info">
                    <h4>Clubs</h4>
                    <p class="faint">Clubs to join in your community</p>
                </div>

                <div class="floating-resource">
                    <a href="{{ route('clubs') }}" class="button small">View</a>
                </div>
            </div>

            <div class="resource">
                <img src="{{ asset('media/garden.jpg') }}" alt="Cafe Cover Image">
                <div class="resource-info">
                    <h4>Nonprofits</h4>
                    <p class="faint">Nonprofits to support in your community</p>
                </div>

                <div class="floating-resource">
                    <a href="{{ route('nonprofits') }}" class="button small">View</a>
                </div>
            </div>

            <div class="resource">
                <img src="{{ asset('media/cafe.jpg') }}" alt="Cafe Cover Image">
                <div class="resource-info">
                    <h4>Programs</h4>
                    <p class="faint">Programs to participate in your community</p>
                </div>

                <div class="floating-resource">
                    <a href="{{ route('programs') }}" class="button small">View</a>
                </div>
            </div>
        </div>
    </div>
@endsection