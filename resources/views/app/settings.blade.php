@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="panel wide center">
    <h1>Profile Settings</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endsection