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

            justify-content: center;
            align-items: center;
        }

        .middle-thing > h1,
        .middle-thing > p{
            color:white;
            text-align: center;
        }

        .middle-thing > p{
            opacity: 0.8;
            font-size: 1rem;
        }
        
        .panel.hero{
            background-color: rgb(255,255,255);
            width: fit-content;

            position:absolute;
            right:20px;
            bottom: 20px;
        }

        .middle-thing{
            background-color: rgba(0,0,0,0.1);
            backdrop-filter: blur(20px);
            
            border-radius: var(--br);
            outline:1px solid rgba(255,255,255,0.2);
            padding: 1rem 1.4rem;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            margin-inline: 20px;
        }

        @media(max-width: 400px){
            .section.hero{
                margin-inline: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="section hero">
        <div class="middle-thing">
            <h1>Community Hub</h1>
            <p>Communicate & Discover Unique Resources in Your Local Community.</p>

            <div class="col input">
                <form action="{{ route('search') }}" method="get">
                    <div class="col input">
                        <input type="text" name="search" placeholder="Search your community...">
                        <button aria-label="Search"><i class="material-symbols-outlined">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection