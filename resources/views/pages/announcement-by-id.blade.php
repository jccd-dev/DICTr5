@extends('layouts.main-layout')

@section("content")

    <x-layouts.top-banner />

    <x-layouts.banner />

    <x-layouts.navbar />
    @empty($announcement)
        <div class="container mx-auto py-14">
            <h2>NO AVAILABLE ANNOUNCEMENT</h2>
        </div>
    @else
        <div class="container mx-auto py-9">
            <h1 class="text-2xl font-bold">{{$announcement->title}}</h1>
            <h6>{{date('F d, Y', strtotime($announcement->timestamp))}}</h6>
            <h4 class="text-xl"> {{$announcement->excerpt}}</h4>
            <br>
            @php echo $announcement->content; @endphp
        </div>
    @endempty

    <x-home.section.details-section />

    <x-footer :data="$visitors" />

@endsection

