<!DOCTYPE html>
<html>

<head>
    <title>Show Book</title>
</head>

<body>
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Published Date:</strong> {{ $book->published_date }}</p>
        <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p><strong>Category:</strong> {{ $book->category->name }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
    </div>
</body>

</html>