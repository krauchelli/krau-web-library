<!DOCTYPE html>
<html>

<head>
    <title>Show Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        @if ($book->cover_image)
        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" width="30%">
        @else
        <img src="https://picsum.photos/200/300" alt="default image. Please upload!">
        @endif
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Published Date:</strong> {{ $book->published_date }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Category:</strong> {{ $book->category->name }}</p>
        <p><strong>PDF File:</strong>
            @if ($book->filename)
            <a href="{{ asset('storage/' . $book->filename) }}" target="_blank">Download</a>
            @else
            No PDF file available.
            @endif
        </p>
        </p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('books.uploadForm', $book->id) }}" class="btn btn-info">Upload Files</a>
    </div>
</body>

</html>