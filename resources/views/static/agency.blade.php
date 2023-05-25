@extends('layouts.main-layout')

@section('content')

<div>
<x-layouts.top-banner />
<x-layouts.banner />
<x-layouts.navbar />
<x-layouts.announcement-marquee />

<div class="w-full flex flex-col justify-center">
    <h1 class="text-left ml-10 mt-7  font-bold font-inter text-4xl">Attached Agencies</h1>
        <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-100 dark:opacity-150" />
        <div class="container my-13 px-6 mx-auto">
        <h2 class="text-left font-inter text-2xl">As per the<strong> Department
            of Information and Communications Act of 2015 (RA 10844)</strong>, the following agencies are hereby attached to the Department 
            for policy and program coordination, and shall continue to operate and function in accordance with the charters, 
            laws or orders creating them, insofar as they are not inconsistent with this Act:</h2>
            
            <ol class=" list-outside list-decimal font-inter text-2xl ml-10">
                <li class="w-full p-4">National Telecommunications Commission</li>
                <li class="w-full p-4">National Privacy Commission</li>
                <li class="w-full p-4">Cybercrime Investigation and Coordination Center</li>
            </ol>
            <h2 class="text-left font-inter text-2xl">ii. The CICC shall be chaired by the DICT Secretary.</h2>
            <p class="mt-6 mb-10 text-left font-inter text-2xl">The laws and rules on government reorganization as 
                provided for in the Republic Act No. 6656, otherwise known as the Reorganization Law, 
                shall govern the reorganization process of the Department.</p>
        </div>
    </div>
    </div>
    <x-footer />
@endsection