@extends('layouts.default')

@section('title', 'Resources')

@section('content')
    <div class="everything">
        <h1>Resources</h1>
        <div class="resources">
            <div class="resource">
                <img src="{{ asset('media/garden.jpg') }}" alt="Garden Cover Image">
                <div class="resource-info">
                    <h4>The one!</h4>
                    <p class="faint">description</p>
                </div>

                <div class="floating">
                    <a href="" class="button small">View</a>
                    <a href="" class="button small morph" aria-label="Save this event"><i class="material-symbols-outlined">bookmark</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection