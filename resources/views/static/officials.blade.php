@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'flex-col w-full gap-10 justify-center container mx-auto'>
        <div class = 'text-center p-10'>
            <div class = 'flex justify-center'>
                <img src="#" class = 'w-[10rem] h-[10rem] rounded-full bg-slate-400'>
            </div>
            <p class = 'font-bold font-1xl'>Maria Peñafrancia L. Nepomuceno</p>
            <p class = 'italic'>DICT Provincial Officer</p>
            </p>
        </div>   
        <div class = 'flex flex-row  justify-center text-center'>
            <div class = 'p-10 w-[20rem]'>
            <div class = 'flex justify-center'>
                <img src="#" class = 'w-[10rem] h-[10rem] rounded-full bg-slate-400'>
            </div>
                <p class = 'font-bold font-1xl'>Ralph Spencer Y. Talagtag</p>
                <p class = 'italic'>Project Development Officer</p>
            </div>
            <div class = 'p-10 w-[20rem]'>
            <div class = 'flex justify-center'>
                <img src="#" class = 'w-[10rem] h-[10rem] rounded-full bg-slate-400'>
            </div>
            <p class = 'font-bold font-1xl'>Clint Vincent A. Gregorio</p>
            <p class = 'italic'>Engineer II</p>
            </div>
            <div class = 'p-10 w-[20rem]'>
            <div class = 'flex justify-center'>
                <img src="#" class = 'w-[10rem] h-[10rem] rounded-full bg-slate-400'>
            </div>
            <p class = 'font-bold font-1xl'>Jhun Mar R. Traballo</p>
            <p class = 'italic'>Engineer I</p>
            </div>
        </div>
    </div>
        <div class = 'w-full bg-[#18375a] h-[0.25rem]'>
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
                            <a href="http://op-proper.gov.ph/" class = 'hover:text-sky-500'>Office of the President</a>
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