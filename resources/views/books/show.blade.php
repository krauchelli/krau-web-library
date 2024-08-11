@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
<div class="container">
    <h1>Book Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $book->title }}
        </div>
        <div class="card-body d-flex">
            <div class="flex-grow-1">
                <h5 class="card-title">Author: {{ $book->author }}</h5>
                <p class="card-text"
                    style="max-height: 4.5em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                    Description: {{ $book->description }}
                </p>
                @if(strlen($book->description) > 20)
                <a href="#" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#descriptionModal">Read
                    More</a>
                @endif
                <p class="card-text">Published Date: {{ $book->published_date }}</p>
                <p class="card-text">ISBN: {{ $book->isbn }}</p>
                <p class="card-text">Category: {{ $book->category->name }}</p>
                <div class="mt-3">
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('books.uploadForm', $book->id) }}" class="btn btn-info">Upload Files</a>
                </div>
            </div>
            <div class="ms-3">
                @if ($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" width="200">
                @else
                <img src="https://picsum.photos/200" alt="default image. Please upload!">
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $book->description }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection