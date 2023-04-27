@extends('layouts.main-layout')

@section("content")
{{--<div class="mt-16"></div>--}}
<x-layouts.top-banner />

{{--<x-layouts.banner />--}}

<x-layouts.banner />
<x-layouts.navbar />

<x-layouts.announcement-marquee />

@include('layouts.About.about-banner')

@include('layouts.About.body')

@include('layouts.About.location')

@include('layouts.About.staff')

@endsection
