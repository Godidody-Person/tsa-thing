@extends('layouts.default')

@section('title', 'Home')

@section('styles')
    <style>
        .section.hero{
            background-image: url('{{ asset("media/cafe.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: left;

            margin-inline: 20px;

            border-radius: 20px;

            align-items: start;

            padding-left: 60px;
        }

        .section.hero > h1,
        .section.hero > p{
            color:white;
        }

        .section.hero > h1{
            text-shadow: 0px 0px 15px rgba(0,0,0,0.5);
        }

        .section.hero > p{
            opacity: 0.7;
        }
        
        .panel.hero{
            background-color: rgb(255,255,255);
            width: fit-content;

            position:absolute;
            right:20px;
            bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="section hero">
        <h1>Community Hub</h1>
        <p>Communicate & Discover Unique Resources in Your Local Community.</p>

        <div class="col">
            @auth
                <a href="{{ route('app.home') }}" class="button">Hub Home</a>
                <a href="{{ route('resources') }}" class="button normal">Resources</a>
            @else
                <a href="{{ route('register') }}" class="button">Get Started</a>
                <a href="{{ route('login') }}" class="button normal">Login</a>
            @endauth
        </div>

        <div class="panel hero">
            <h2>Gandalf's Weed Rave</h2>
            <div class="col">
                <a href="" class="button">Sign up</a>
                <a href="" class="button mono"><i class="material-symbols-outlined">open_in_new</i></a>
            </div>
            <div class="col" style="scale:0.8">
                <button class="normal">
                    <i class="material-symbols-outlined">chevron_left</i>
                </button>

                <p>1/6</p>

                <button class="mono">
                    <i class="material-symbols-outlined">chevron_right</i>
                </button>
            </div>
        </div>
    </div>
@endsection