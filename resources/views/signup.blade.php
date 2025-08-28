<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-blue-400">

<div class="bg-blue-500 text-white px-6 py-3 flex items-center justify-between">

    <a href="/" class="text-3xl font-bold">OpenNotes</a>

    <div class="space-x-6">
        <a href="/" class="hover:underline">Home</a>
        <a href="/signin" class="hover:underline">Login</a>
    </div>
</div>
    
<div class="min-h-screen flex items-center justify-center">

    <div class="border-2 p-8 w-96 bg-blue-500 text-white font-sans text-center flex items-center justify-center rounded-xl shadow-lg">
        <form action="/register" method="POST" class="w-full">
            <h1 class="text-4xl font-bold pb-8">Register</h1>
            @csrf
            <input type="text" name="name" placeholder="Enter your name" class="border-2 mb-4 w-full p-2 rounded text-black" />
            <input type="text" name="email" placeholder="Enter your email" class="border-2 mb-4 w-full p-2 rounded text-black" />
            <input type="password" name="password" placeholder="Enter your password" class="border-2 mb-6 w-full p-2 rounded text-black" />
            <button type="submit" class="w-full text-blue-500 px-4 py-2 rounded-xl hover:bg-gray-200 bg-white font-bold">
                Submit
            </button>
        </form>
    </div>

</div>

</body>
</html>