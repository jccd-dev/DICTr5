@extends('layouts.main-layout')

@section("content")

<div class="mt-16"></div>

@include('layouts.home.announcement-marquee')

@include('layouts.home.home-slider')

<div class="flex justify-center items-center h-screen w-screen">

    <h1 class="text-4xl">Hello World</h1>
</div>
@endsection
