@extends('layouts.main-layout')

@section("content")

<div class="mt-16"></div>

@include('components.banner')

@include('layouts.home.announcement-marquee')

@include('layouts.home.home-slider')

@include('layouts.home.section.exam-section')

@include('layouts.home.section.calendar-section')

@include('layouts.home.section.highlight-post-section')

@include('layouts.home.section.services-section')


{{-- @include('layouts.home.calendar-v3') --}}


{{-- @include('layouts.home.calendar-v2') --}}

<div class="flex justify-center items-center h-screen w-screen">

    <h1 class="text-4xl">Hello World</h1>
</div>
@endsection
