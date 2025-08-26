<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}" class="border-2 mb-2">
        <textarea name="body" class="border-2 mb-2">{{$post->body}}</textarea><br>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">Update Post</button>
    </form>
</body>
</html>