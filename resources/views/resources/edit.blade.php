@extends('layouts.app')

@section('title', 'Resources')

@section('content')
    <h1>Edit Resource</h1>
    <div class="panel">
        <form action="{{ route('app.resource.edit', $resource->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $resource->name }}" required>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ $resource->description }}" required>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="{{ $resource->type }}" required>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*" required>
            
            <div class="col">
                <button type="submit" class="button">Update</button>
                <a href="{{ route('app.resources') }}" class="button normal">Cancel</a>
            </div>
        </form>
    </div>
@endsection