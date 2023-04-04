@extends('layouts.main-layout')

@section("content")

<div class="mt-16"></div>

<x-layouts.banner />

<x-layouts.announcement-marquee />

<x-home.section.home-slider />

<x-home.section.exam-section />

<x-home.section.calendar-section />

<x-home.section.services-section />

<x-home.section.contact-center-section />

<x-forms.input required="true" name="Name" type="text" placeholder="Enter name" />

<x-home.section.details-section />

<div class="flex justify-center items-center h-screen w-screen">

    <h1 class="text-4xl">Hello World</h1>
</div>
@endsection
