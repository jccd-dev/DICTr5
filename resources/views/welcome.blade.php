@extends('layouts.main-layout')

@section("content")

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<x-layouts.announcement-marquee />

<x-home.section.home-slider :data="$data['banner']" />

<x-home.section.exam-section />

@if(isset($data['posts']) && count($data['posts']) > 0)
    <x-home.section.highlight-post-section :data="$data['posts']" />
@endif

<x-home.section.calendar-section />

<x-home.section.services-section />

<x-home.section.contact-center-section />

<x-home.section.details-section />

<x-footer :data="$data['visitors']"/>

@endsection

