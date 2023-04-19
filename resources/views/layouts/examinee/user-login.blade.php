@extends('layouts.main-layout')

@section("content")
    <div class="container mx-auto mt-3">
        <a href="{{route('redirect.google')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow cursor-pointer">
            <svg class="inline-block w-5 h-5 mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.5 12c0-1.5-.1-3-.3-4.5H12v9h5.2c-.2 1.2-.7 2.3-1.5 3.3l2.3 1.8c1.4-1.3 2.4-3.1 2.9-5.1l-2.9-2.5c.8-1.5 1.2-3.2 1.2-5zm-9 9c2.1 0 3.9-.7 5.4-1.9l-2.9-2.5c-.8.6-1.9 1-2.9 1-2.3 0-4.2-1.6-4.8-3.7H3.8c.6 2.8 3 5 5.9 5zm9-18c-1.1 0-2.1.3-3 .8l2.9 2.5c.8-.5 1.9-.8 3-.8 2.9 0 5.3 2.2 5.8 5h3.3c-.6-3.7-3.8-6.7-7.9-6.7z" fill="currentColor"/>
            </svg>
            <span>Log in with Google</span>
        </a>
          
    </div>
@endsection