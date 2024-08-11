@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @error('email')
            <div class"invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @error('password')
            <div class"invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Login</button>
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
    </form>
</div>
@endsection