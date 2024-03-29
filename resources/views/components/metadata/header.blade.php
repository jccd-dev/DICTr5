<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="{{ asset("/favicon.ico") }}">
<title>
    @if(request()->routeIs('admin.cms.announcement')) {{'Announcement'}}
    @elseif(request()->routeIs('admin.cms.calendar')) {{'Event Calendar'}}
    @elseif(request()->routeIs('admin.dashboard')) {{'Dashboard'}}
    @elseif(request()->routeIs('admin.exam-schedule')) {{'Exam Schedule'}}
    @elseif(request()->routeIs('admin.cms.category')) {{'Category'}}
    @elseif(request()->routeIs('admin.cms.slider')) {{'Slider'}}
    @elseif(request()->routeIs('admin.cms.posts')) {{'Posts'}}
    @elseif(request()->routeIs('admin.inbox')) {{'Inbox'}}
    @elseif(request()->routeIs('admin.examinees')) {{'Exam Applicants'}}
    @elseif(request()->routeIs('admin.accounts')) {{'Admin Accounts'}}
    @elseif(request()->routeIs('admin.system-logs')) {{'All Logs'}}
    @elseif(request()->routeIs('examinee.get')) {{'Applicant Data'}}
    @else {{'DICT Camarines Sur'}}
    @endif
</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
{{-- Sweet Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
{{-- CKEDITOR --}}
<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script> --}}


{{-- <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> --}}
{{-- <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> --}}

{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
{{-- Sweet Alert 2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
{{-- CKEDITOR --}}
<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
{{-- PDFViewer--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>


<!-- Styles -->
<wireui:styles />
<wireui:scripts />

{{-- Fullcalendar --}}
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
@livewireStyles
