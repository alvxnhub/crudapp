<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="bg-blue-400">
     
    @auth 

   <div class="bg-blue-500 text-white px-6 py-3 flex items-center justify-between">

            <a href="/" class="text-3xl font-bold">OpenNotes</a>
            <div class="flex items-center space-x-6">
                <a href="/" class="hover:underline">Home</a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            </div>
    </div>


    <H1 class="text-2xl font-bold text-white pt-2 pl-2">You are login as {{auth()->user()->name}}</H1>

        <div class="border-2 p-4 m-4 text-white">
            <h1 class="text-xl font-bold">Create Post</h1>
            <form action="/create-posts" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Enter post title: " class="border-2 mb-2">
                <textarea name="body" placeholder="Enter post body: " class="border-2 mb-2"></textarea><br>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">Create Post</button>
            </form>
        </div>

    <div>
        <h2 class="text-4xl font-bold pl-5 text-white">All Posts</h2>
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
    <div class="bg-blue-500 text-white px-6 py-3 flex items-center justify-between">
        <a href="/" class="text-3xl font-bold">OpenNotes</a>
            <div class="space-x-6">
                <a href="/signup" class="hover:underline">Register</a>
                <a href="/signin" class="hover:underline">Login</a>
            </div>
        </div>

    <header class=" text-white bg-blue-400 w-full h-225 text-center p-5">
        <h1 class="text-5xl font-bold pb-2">Welcome To OpenNotes</h1>
        <h3 class="text-xl">Here you can create and manage your notes easily. You can share you thoughts and ideas with others.</h3>
    </header>

    @endauth

    
</body>
</html>