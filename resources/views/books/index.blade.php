@extends('layouts.app')

@section('title', 'Books List')

@section('header', 'Books List')

@section('content')
<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-4">
            <div class="card mb-4">
                @if ($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}">
                @else
                <img src="https://picsum.photos/200" class="card-img-top" alt="default image. Please upload!">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="card-text"><strong>Published Date:</strong> {{ $book->published_date }}</p>
                    <p class="card-text"><strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ $book->category->name }}</p>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('books.uploadForm', $book->id) }}" class="btn btn-info">Upload Files</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection