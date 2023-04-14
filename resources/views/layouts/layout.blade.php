<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-metadata.header />
</head>
<body class="overflow-y-scroll overflow-x-hidden">

    {{ $slot }}


    @livewireScripts
</body>
</html>
