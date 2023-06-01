@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'justify-center container mx-auto'>
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
        <a href="http://www.officialgazette.gov.ph/2016/05/23/republic-act-no-10844/" class = 'text-sky-700 hover:text-sky-600'>Republic Act No.10844</a>
        <br>
        <br>
        <p>For a complete copy of the Implementing Rules and Regulation, please click on the link below:</p>
        <br>
        <a href="https://dict.gov.ph/wp-content/uploads/2016/10/DICT-IRR.pdf" class = 'text-sky-700 hover:text-sky-600'>Republic Act No. 10844 IRR</a>
        
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
