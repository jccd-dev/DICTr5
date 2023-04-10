@extends('layouts.main-layout')

@section("content")

<div class="h-10 w-full bg-custom-blue flex justify-end">
    <div class="flex items-center gap-5 h-full px-10">
        <a href="#" class="w-6 opacity-50 hover:opacity-100">
            <img src="{{ asset('img/Facebook.png') }}" class="w-full" alt="">
        </a>
        <a href="#" class="w-6 opacity-50 hover:opacity-100">
            <img src="{{ asset('img/Twitter Squared.png') }}" class="w-full" alt="">
        </a>
        <a href="#" class="w-6 opacity-50 hover:opacity-100">
            <img src="{{ asset('img/Youtube.png') }}" class="w-full" alt="">
        </a>
        <a href="#" class="w-6 opacity-50 custom:opacity-90 hover:opacity-100">
            <img src="{{ asset('img/Instagram.png') }}" class="w-full" alt="">
        </a>
    </div>
</div>

<x-layouts.banner />

<x-layouts.navbar />

<x-layouts.announcement-marquee />

<x-home.section.home-slider />

<x-home.section.exam-section />

<x-home.section.highlight-post-section />

<x-home.section.calendar-section />

<x-home.section.services-section />

<x-home.section.contact-center-section />

<x-forms.input required="true" name="Name" type="text" placeholder="Enter name" />

<x-forms.textarea required="true" name="Name" placeholder="Enter name" />

<x-home.section.details-section />

@endsection


