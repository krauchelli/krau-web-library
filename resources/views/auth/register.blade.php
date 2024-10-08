@extends('layouts.app')

@section('title', 'Register')

@section('content')

<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">
                @error('name')
                <div class"invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
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
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                <div class"invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    @endsection