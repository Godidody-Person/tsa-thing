@extends('layouts.app')

@section('title', 'Resources')

@section('content')
    <div class="everything">
        <h1>Resources</h1>
        <h4>Events</h4>
        <div class="resources-wrapper">
            <div class="resources">
                @for($i = 0; $i < 10; $i++)
                <div class="resource">
                    <img src="{{ asset('media/garden.jpg') }}" alt="Garden Cover Image">
                    <div class="resource-info">
                        <h4>Gandalf's Weed Rave</h4>
                        <p class="faint">description</p>
                    </div>

                    <div class="floating">
                        <a href="" class="button small">View</a>
                        <a href="" class="button small morph" aria-label="Save this event"><i class="material-symbols-outlined">bookmark</i></a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        <h4>Programs</h4>
        <div class="resources-wrapper">
            <div class="resources">
                @for($i = 0; $i < 10; $i++)
                <div class="resource">
                    <img src="{{ asset('media/cafe.jpg') }}" alt="Garden Cover Image">
                    <div class="resource-info">
                        <h4>Gandalf's Weed Party</h4>
                        <p class="faint">there's enough weed to turn mordir into a jungle</p>
                    </div>

                    <div class="floating">
                        <a href="" class="button small">View</a>
                        <a href="" class="button small morph" aria-label="Save this event"><i class="material-symbols-outlined">bookmark</i></a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection