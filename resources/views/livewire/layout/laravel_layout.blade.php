{{-- Temporary Layout --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{request()->routeIs('admin.cms.announcement') ? 'Announcement' : ''}}</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    {{-- CKEDITOR --}}
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/fullcalendar.js')
    @livewireStyles
</head>
<body>
    <div class="container mx-auto">
        {{$slot}}
     </div>
    @livewireScripts
</body>
</html>