<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-metadata.header />
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/moment.js'])
    </head>
    <body class="overflow-y-scroll overflow-x-hidden">

        {{-- Add Content --}}
        @yield('content')

        {{-- Footer Section --}}

        <x-layouts.accesability />

    @livewireScripts
    </body>
</html>
