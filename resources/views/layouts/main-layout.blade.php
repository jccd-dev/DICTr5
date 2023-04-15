<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-metadata.header />
    </head>
    <body class="overflow-y-scroll overflow-x-hidden">

        {{-- Add Content --}}
        @yield('content')

        {{-- Footer Section --}}
        @hasSection ('components.footer')
            @include('components.footer')
        @endif

        <x-layouts.accesability />

        @livewireScripts
    </body>
</html>
