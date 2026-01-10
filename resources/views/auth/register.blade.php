@extends('layouts.default')

@section('title', 'Register')

@section('content')
<div class="panel center">
    <h1>Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div style="width:100%; text-align:left; margin-bottom:10px;">
            <label for="name" style="display:block; margin-bottom:5px;">Username</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Username"
                required
            >
            @error('name')
                <div style="color:red; font-size:14px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="width:100%; text-align:left; margin-bottom:10px;">
            <label for="email" style="display:block; margin-bottom:5px;">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Email"
                required
            >
            @error('email')
                <div style="color:red; font-size:14px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="width:100%; text-align:left; margin-bottom:10px;">
            <label for="password" style="display:block; margin-bottom:5px;">Password</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Password"
                required
            >
            @error('password')
                <div style="color:red; font-size:14px; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="width:100%; text-align:left; margin-bottom:10px;">
            <label for="password_confirmation" style="display:block; margin-bottom:5px;">Confirm Password</label>
            <input
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                placeholder="Re-type password"
                required
            >
        </div>

        <div style="width:100%; text-align:left; margin-bottom:20px;">
            <button type="submit" class="button primary" style="width:100%;">Register</button>
        </div>

        @if ($errors->any())
            <div style="color:red; font-size:14px; margin-bottom:15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <p>Already have an account? <a href="{{ route('login') }}" style="color:var(--color-primary);">Login here</a></p>
    </form>
</div>
@endsection
