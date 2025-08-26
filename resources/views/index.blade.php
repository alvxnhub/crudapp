<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body>

    @auth 
    <H1 class="text-xl font-bold">You are login as {{auth()->user()->name}}</H1>
    <form action="/logout" method="POST">
        @csrf
        <button class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">Logout</button>
    </form>

    <div class="border-2 p-4 m-4">
        <h1 class="text-xl font-bold">Create Post</h1>
        <form action="/create-posts" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Enter post title: " class="border-2 mb-2">
            <textarea name="body" placeholder="Enter post body: " class="border-2 mb-2"></textarea><br>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">Create Post</button>
        </form>
    </div>

    <div>
        <h2 class="text-4xl font-bold pl-5">All Posts</h2>
        @foreach ($posts as $post)
            <div class="border-2 p-4 m-4 bg-blue-500 text-white rounded-xl">
                <h3 class="text-lg font-bold">{{$post['title']}} by {{$post->user->name}}</h3>
                <p>{{$post['body']}}</p>
                <p class="mb-2 bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600 w-15 "><a href="/edit-post/{{$post['id']}}">Edit</a></p>
                <form action="/delete-post/{{$post['id']}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600">Delete</button>
                </form>
            </div>
        @endforeach
    </div>




    @else
    <div class="border-2 p-4 m-4">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter your name">
            <input type="text" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="border-2 p-4 m-4">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="Enter your username">
            <input type="password" name="loginpassword" placeholder="Enter your password">
            <button>Submit</button>

        </form>
    </div>


    @endauth

    
</body>
</html>