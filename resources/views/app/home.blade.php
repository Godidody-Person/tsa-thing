@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome Back, {{ auth()->user()->name }}!</h1>
    <h2>What the community's up to</h2>
@endsection