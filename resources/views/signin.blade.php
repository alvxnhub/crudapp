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
    <!-- Left Side (Logo / Brand) -->
    <a href="/" class="text-3xl font-bold">OpenNotes</a>

    <!-- Right Side (Nav Links) -->
    <div class="space-x-6">
        <a href="/" class="hover:underline">Home</a>
        <a href="/signup" class="hover:underline">Register</a>
    </div>
</div>
     <!-- Parent container that centers everything -->
<div class="min-h-screen flex items-center justify-center">

    <!-- Your login box -->
    <div class="border-2 p-8 w-96 bg-blue-500 text-white font-sans text-center flex items-center justify-center rounded-xl shadow-lg">
        <form action="/login" method="POST" class="w-full">
            <h1 class="text-4xl font-bold pb-8">Log In</h1>
            @csrf
            <input type="text" name="loginname" placeholder="Enter your username" class="border-2 mb-4 w-full p-2 rounded text-black"/>
            <input type="password" name="loginpassword" placeholder="Enter your password" class="border-2 mb-6 w-full p-2 rounded text-black"/>
            <button class="w-full text-blue-500 px-4 py-2 rounded-xl hover:bg-gray-200 bg-white font-bold"> Submit </button>
        </form>
    </div>

</div>

</body>
</html>