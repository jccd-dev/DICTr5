@extends('layouts.main-layout')

@section("content")

    <x-layouts.top-banner />

    <x-layouts.banner />

    <x-layouts.navbar />
    <br>
    <div class="container mx-auto py-16">
       @forelse($data as $search_result)
            <a href="{{$search_result['url']}}">
               <div class="p-5 bg-slate-200 rounded">
                   <div class="px-3 py-1 text-xs font-semibold bg-[#00296B] text-white rounded-lg w-fit">{{$search_result['type']}}</div>
                   <h3 class="font-semibold">{{$search_result['name']}}</h3>
               </div>
            </a>
       @empty
       @endforelse

    </div>
    <br>
    <br>
    <br>
    <x-home.section.details-section />

    <x-footer :data="$visitors" />

@endsection

