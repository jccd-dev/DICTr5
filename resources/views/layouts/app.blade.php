<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-metadata.header />

</head>
<body>
    <div class="container mx-auto flex justify-center">
        <livewire:cms.slider />
    </div>
@livewireScripts
</body>
</html>
