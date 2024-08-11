<!DOCTYPE html>
<html>

<head>
    <title>Books PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Books List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Date</th>
                <th>ISBN</th>
                <th>Category</th>
                <th>PDF Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_date }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->category->name }}</td>
                <td>
                    @if ($book->filename)
                    <a href="{{ asset('storage/' . $book->filename) }}" target="_blank">Download</a>
                    @else
                    No PDF file available.
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>