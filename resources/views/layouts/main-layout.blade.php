<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("components.header")
    </head>
    <body>

        @include("components.navbar")

        {{-- Add Content --}}
        @yield('content')

        {{-- Footer Section --}}
        @hasSection ('components.footer')
            @include('components.footer')
        @endif
</body>
</html>
