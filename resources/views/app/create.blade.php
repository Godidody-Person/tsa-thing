@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <h1>Create a Community Resource</h1>
    <div class="panel">
        <form action="" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" maxlength="255" required placeholder="Name">
            
            <label for="type">Type of Resource</label>
            <select name="type" id="type">
                <option value="event">Event</option>
                <option value="support">Support Service</option>
                <option value="program">Community Program</option>
            </select>
        </form>
    </div>
@endsection