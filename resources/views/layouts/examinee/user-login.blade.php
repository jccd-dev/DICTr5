@extends('layouts.main-layout')

@section("content")
    <div class="container mx-auto mt-3">

        <div class="md:flex md:flex-row font-quicksand">
            <div class="basis-1/2 lg:px-20">
                <a href="{{route('homepage')}}" class="flex flex-row font-quicksand">
                    <svg fill="none" class="w-12" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-bold text-xl p-3">Go back to homepage</span>
                </a>
                <br>
                <div class="bg-[#00296B] text-white p-5 text-center rounded-xl py-12">
                    <img src="{{asset('img/ILCDB.png')}}" class="w-28 mx-auto">
                    <h3 class="text-xl font-bold">ICT Proficiency Exam Login</h3>
                    <a href="{{route('redirect.google')}}" type="button" class="mt-10 font-bold bg-white text-slate-900 rounded-lg px-5 py-2.5 text-center inline-flex items-center">
                        <img src="{{asset('img/googleicon.svg')}}" class="w-8 pr-3" />
                        Sign in with Google
                    </a>
                </div>
                <p class="mt-2 font-bold text-sm">
                    By using this service, you understood and agree to the <a href="#" class="text-[#00296B]">DICT Camarines Sur Online Services</a> <a href="#" class="text-red-600">Terms of Use</a> and <a href="#" class="text-red-600">Privacy Statement</a>.
                </p>
            </div>
            <div class="basis-1/2 h-full bg-blue-600">

            </div>
        </div>

        <br>

    </div>
@endsection
