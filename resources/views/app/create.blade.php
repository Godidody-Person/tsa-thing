@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <h1>Create a Community Resource</h1>
    <div class="panel">
        <form action="{{ route('app.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" maxlength="255" required placeholder="Name">
            
            <label for="type">Type of Resource</label>
            <select name="type" id="type">
                <option value="event">Event</option>
                <option value="support">Support Service</option>
                <option value="nonprofit">Nonprofit Organization</option>
                <option value="program">Community Program</option>
                <option value="club">Community Club</option>
            </select>
            
            <label for="description">Description</label>
            <textarea name="description" id="description" required placeholder="Enter location, date, time, and any other relevant information."></textarea>
            
            <label for="image">Image (&lt;2MB)</label>
            <input type="file" id="image" name="image" required accept="image/*">

            @if($errors->any())
                <p class="faint error" id="error">{{ $errors->first() }}</p>
            @endif
            
            <button type="submit">Create</button>
        </form>
    </div>
@endsection