


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <label for="content">Content</label>
        <textarea name="content" required></textarea>
        <button type="submit">Create Post</button>
    </form>
    </body>
</html>