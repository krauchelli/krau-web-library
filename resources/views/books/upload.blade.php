<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File and Book Cover</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Upload Book Files</h1>
        <form action="{{ route('books.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pdf">Choose PDF File</label>
                <input type="file" class="form-control" id="pdf" name="pdf" required>
            </div>
            <div class="form-group">
                <label for="cover_image">Choose Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" required>
            </div>
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>