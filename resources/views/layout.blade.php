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
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-zinc-800">
        <nav class="w-full flex py-4 bg-blue-300 justify-between text-blue-950">
            <h1 class="text-2xl ml-3  font-extrabold">My CalendAPP</h1>
            <ul class="flex">
                <li class="px-3">
                    <a class="cursor-pointer font-bold" href="/calendars" >Your Calendars</a>
                </li>
                <li class="px-3">
                    <a class="cursor-pointer font-bold" href="/calendars/new">New Calendar</a>
                </li>
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
