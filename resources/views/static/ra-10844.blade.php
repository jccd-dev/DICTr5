@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'justify-center'>
    <div class = 'flex-col px-4 py-8'>
        <h1 class = 'text-3xl font-bold'>Republic Act No. 10844</h1>
    </div>

    <hr>

    <div class = 'p-4'>
        <p><b>Republic Act No. 10844</b>, otherwise known as the “Department of Information and Communications Technology Act of 2015”, which was signed into law on 23 May 2016.
        <br>
        In accordance to the law, the<b> Department of Information and Communications Technology (DICT) </b> shall be the primary policy, 
        planning, coordinating, implementing, and administrative entity of the Executive Branch of the government that will plan, develop, 
        and promote the national ICT development agenda.
        <br>
        <br>
        The DICT shall strengthen its efforts on the following focus areas: </p>
        <ul class = 'list-disc p-4'>
            <li>Policy and Planning</li>
            <li>Improved Public Access</li>
            <li>Resource-Sharing and Capacity-Building</li>
            <li>Consumer Protection and Industry Development</li>
        </ul>
        <br>
        <p>Apart from this, the DICT is expected to spearhead the following endeavors:</p>
        <ul class = 'list-disc p-4'>
            <li>Nation building Through ICT</li>
            <li>Safeguarding of Information</li>
            <li>Advancement of ICT in the Philippines</li>
        </ul>
        <br>
        <p>Aligning with the current administration’s ICT Agenda, the DICT will prioritize the following:</p>
        <ul class = 'list-disc p-4'>
            <li>Development of a National Broadband Plan to accelerate the deployment of fiber optic cables and wireless technologies to improve
                 internet speed</li>
            <li>Provision of Wi-Fi access at no charge in selected public places including parks, plazas, public libraries, schools, 
                government hospitals, train stations, airports, and seaports</li>
            <li>Development of a National ICT Portal</li>
        </ul>
        <br>
        <p>For information and guidance of all concerned, please click on the link below:</p> 
        <br>
        <a href="http://www.officialgazette.gov.ph/2016/05/23/republic-act-no-10844/" class = 'hover:text-sky-600'>Republic Act No.10844</a>
        <br>
        <br>
        <p>For a complete copy of the Implementing Rules and Regulation, please click on the link below:</p>
        <br>
        <a href="https://dict.gov.ph/wp-content/uploads/2016/10/DICT-IRR.pdf" class = 'hover:text-sky-600'>Republic Act No. 10844 IRR</a>
        
    </div>
</div>

@endsection
