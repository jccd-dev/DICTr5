@extends('layouts.main-layout')

@section("content")

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<x-layouts.announcement-marquee />

<x-home.section.home-slider :data="$data" />

<x-home.section.exam-section />

<x-home.section.highlight-post-section />

<x-home.section.calendar-section />

<x-home.section.services-section />

<x-home.section.contact-center-section />

<x-home.section.details-section />

<x-footer />

@endsection

