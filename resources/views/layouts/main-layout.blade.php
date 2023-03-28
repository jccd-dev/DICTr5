<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("components.header")
    </head>
    <body>

        @yield('content')

        {{-- Footer --}}
        @hasSection ('components.footer')
            @include('components.footer')
        @endif
</body>
</html>
