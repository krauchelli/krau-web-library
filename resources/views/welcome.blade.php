@extends('layouts.app')

@section('title', 'Welcome!')

@section('content')
<div class="container">
    <h1>Welcome!</h1>
    <p>This is a simple Laravel application to manage books.</p>
    <p>Click <a href="{{ route('books.index') }}">here</a> to view the list of books.</p>
</div>
@endsection