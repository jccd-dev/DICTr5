<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-metadata.header />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/utils/moment.js'])
</head>
<body class="overflow-y-scroll overflow-x-hidden">
<div class="flex h-full w-full justify-center items-center">
    {{ $slot }}
</div>
@livewireScripts
</body>
</html>
