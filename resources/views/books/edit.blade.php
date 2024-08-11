@extends('layouts.app')

@section('title', 'Edit Book')

@section('header', 'Edit Book')

@section('content')
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $book->title) }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                value="{{ old('author', $book->author) }}" required>
            @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" name="published_date" class="form-control @error('published_date') is-invalid @enderror"
                value="{{ old('published_date', $book->published_date) }}" required>
            @error('published_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror"
                value="{{ old('isbn', $book->isbn) }}" required>
            @error('isbn')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection