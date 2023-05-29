@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'container mx-auto justify-center'>
    <div class = 'flex-col px-4 py-8'>
        <h1 class = 'text-3xl font-bold'>MISSION AND VISION</h1>
    </div>

    <hr>

    <div class = 'p-4'>
        <h2 class = 'text-base font-bold'>Mission</h2>
        <br>
        <p class = 'italic'>"DICT of the people and for the people."</p>
        <br>
        <p>The Department of Information and Communications Technology commits to:<p>
        <ul class = 'list-disc p-4'>
            <li>Provide every Filipino access to vital ICT infostructure and services</li>
            <li>Ensure sustainable growth of Philippine ICT-enabled industries
                resulting to creation of more jobs</li>
            <li>Establish a One Digitized Government, One Nation</li>
            <li>Support the administration in fully achieving its goals</li>
            <li>Be the enabler, innovator, achiever and leader in pushing the country’s
                development and transition towards a world-class digital economy</li>
        </ul>
        <br>
        <h2 class =  'text-base font-bold'>Vision</h2>
        <br>
        <p class = 'italic'>“An innovative, safe and happy nation that thrives through
            and is enabled by Information and Communications Technology.”</p>
        <br>
        <p>DICT aspires for the Philippines to develop and flourish through innovation
            and constant development of ICT in the pursuit of a progressive, safe, secured, contented
            and happy Filipino nation.</p>
        <br>

        <h2 class = 'text-base font-bold'>Core Values</h2>
        <br>
        <p>D – Dignity</p>
        <p>I – Integrity</p>
        <p>C – Competency and Compassion</p>
        <p>T – Transparency</p>
    </div>

</div>

<div class= "w-full bg-[#2C2C2C] text-white text-xs p-4">
   <div class="flex flex-row container mx-auto ">
    <section class="w-full">
      <footer class="text-white w-full">
        <div class="w-full">
          <div class="flex justify-evenly gap-10 flex-wrap">
              <div class="">
                 <img
                  src="{{ asset('img/gov-seal2.png') }}"
                  class="w-[8rem] lg:w-[10rem]"/>
              </div>

              <div class="flex-1 xl:flex-2">
                  <h5 class="font-bold text-base">REPUBLIC OF THE PHILIPPINES</h5>
                  <br>
                  <p>
                    All contain is in the public domain unless otherwise stated.
                  </p>
              </div>
              <div class="flex-1">
                  <h5 class="font-bold text-base">ABOUT GOVPH</h5>
                  <br>
                  <p>
                    Learn more about the Philippine government, its structure,
                    <br> how government works and the people behind it.
                  </p>
                  <br>
                  <ul class="list-unstyled mb-0">
                     <li>
                      <a href="https://www.gov.ph/" class = 'hover:text-sky-500'>GOV.PH</a>
                     </li>
                      <li>
                         <a href="https://www.gov.ph/data" class = 'hover:text-sky-500'>Open Data Portal</a>
                      </li>
                      <li>
                         <a href="https://www.officialgazette.gov.ph/" class = 'hover:text-sky-500'>Official Gazette</a>
                      </li>
                  </ul>
              </div>
                <div class="flex-1">
                    <h5 class="text-uppercase font-bold text-base">GOVERNMENT LINKS</h5>
                    <br>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>Office of the President</a>
                        </li>
                        <li>
                            <a href="http://ovp.gov.ph/" class = 'hover:text-sky-500'>Office of the Vice President</a>
                        </li>
                        <li>
                            <a href="http://legacy.senate.gov.ph/" class = 'hover:text-sky-500'>Senate of the Philippines</a>
                        </li>
                        <li>
                            <a href="https://www.congress.gov.ph/" class = 'hover:text-sky-500'>House of Representatives</a>
                        </li>
                        <li>
                            <a href="https://www.officialgazette.gov.ph/" class = 'hover:text-sky-500'>Official Gazette</a>
                        </li>
                        <li>
                            <a href="https://sc.judiciary.gov.ph/" class = 'hover:text-sky-500'>Supreme Court</a>
                        </li>
                        <li>
                            <a href="https://sb.judiciary.gov.ph/" class = 'hover:text-sky-500'>Sandiganbayan</a>
                        </li>
                    </ul>
                </div>
           </div>
        </div>
     </footer>
    </section>
   </div>
</div>

@endsection
