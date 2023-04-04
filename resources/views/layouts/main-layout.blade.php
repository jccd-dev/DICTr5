<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-metadata.header />
    </head>
    <body class="overflow-y-scroll overflow-x-hidden">

        <x-layouts.navbar />

        {{-- Add Content --}}
        @yield('content')

        {{-- Footer Section --}}
        @hasSection ('components.footer')
            @include('components.footer')
        @endif
    </body>
</html>
