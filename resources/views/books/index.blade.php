<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Books List</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        <a href="{{ route('books.export.pdf') }}" class="btn btn-primary">Export to PDF</a>
        <a href="{{ route('books.export.excel') }}" class="btn btn-primary">Export to Excel</a>
        <form action="{{ route('books.index') }}" method="GET" class="mt-3">
            <div class="form-group">
                <label for="category_id">Filter by Category</label>
                <select name="category_id" class="form-control" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>ISBN</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>
                        @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" width="50">
                        @else
                        <img src="https://picsum.photos/50" alt="default image. Please upload!">
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_date }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('books.uploadForm', $book->id) }}" class="btn btn-info">Upload Files</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- logout temp button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
    </div>

</body>

</html>