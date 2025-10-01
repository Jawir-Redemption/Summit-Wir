<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    @foreach ($categories as $category)
        <h1>{{ $category->category }}</h1>
    @endforeach
</body>
</html>