@extends('layouts.default')

@section('title', 'Login')

@section('content')
<div class="panel center">
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
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

        <div style="width:100%; text-align:left; margin-bottom:20px;">
            <button type="submit" class="button primary" style="width:100%;">Login</button>
        </div>

        @if ($errors->any())
            <div style="color:red; font-size:14px; margin-bottom:15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <p>Don't have an account? <a href="{{ route('register') }}" style="color:var(--color-primary);">Register here</a></p>
    </form>
</div>
@endsection
