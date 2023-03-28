<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
         @vite(['resources/js/home.js'])
    </head>
    <body>
        <div class="w-screen h-screen flex justify-center items-center">
            <h1 class="text-3xl">Tailwind CSS</h1>
        </div>
    </body>
</html>
