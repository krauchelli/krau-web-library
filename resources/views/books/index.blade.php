<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
</head>

<body>
    <h1>Books List</h1>

    <!-- logout temp button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
</body>

</html>