@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'justify-center'>
    <div class = 'flex-col px-4 py-8'>
    <h1 class = 'text-3xl font-bold'>DICT Region V - Camarines Sur Address</h1>
        <br>
        <hr>
        <br>
        <div class = 'container mx-auto'>
            <h2 class =  'text-large'></h2>
            <div class = 'p-10 flex justify-center w-full'>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.6185690901716!2d123.16618047370406!3d13.62009250033203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a18b28b8be7b9b%3A0x230f24f4b29ffc99!2sDICT%20Camarines%20Sur!5e0!3m2!1sen!2sph!4v1685596957565!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </div>

    @endsection