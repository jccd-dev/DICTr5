@extends('layouts.main-layout')

@section("content")

    <x-layouts.top-banner />

    <x-layouts.banner />

    <x-layouts.navbar />
    <br>
    <div class="container mx-auto py-10">
       @forelse($data as $search_result)
            <a href="{{$search_result['url']}}" class="m-3">
               <div class="p-5 bg-slate-200 rounded">
                   <div class="px-3 py-1 text-xs font-semibold bg-[#00296B] text-white rounded-lg w-fit">{{$search_result['type']}}</div>
                   <h3 class="font-semibold">{{$search_result['name']}}</h3>
               </div>
            </a>
       @empty
            <div class="container mx-auto py-14">
                <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">No Search Result!</span> You are trying to search for <i>{{$search}}</i>.
                    </div>
                </div>
            </div>
       @endforelse

    </div>
    <br>
    <br>
    <br>
    <x-home.section.details-section />

    <x-footer :data="$visitors" />

@endsection

