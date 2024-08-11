<!DOCTYPE html>
<html>

<head>
    <title>Books PDF</title>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>