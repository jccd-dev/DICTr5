@extends('layouts.main-layout')

@section("content")
<div class="mt-16"></div>
@include('components.banner')

@include('layouts.home.announcement-marquee')

@include('layouts.About.about-banner')

@include('layouts.About.body')

@include('layouts.About.location')

@include('layouts.About.staff')

@endsection