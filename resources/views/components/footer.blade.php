<div class = "flex flex-row w-full p-10 gap-10 bg-white text-black container mx-auto justify-evenly flex-wrap">
      <div class = "flex-1 order-1 md:order-none">
        <div class =  "w-fit md:w-64">
            <img src="{{asset('img/DICT Standard Commercial Logo .png')}}">
        </div>
        <div class="ml-5">
            <h2 class = "font-bold  text-sm">Contact Information</h2>
            <p class = "text-sm">EMAIL : <a href="#" class = "hover:text-sky-500">example@dict.gov.ph</a></p>
            <p class = "text-sm">PHONE : (882) 1938 284</p>
        </div>

      </div>
      <div class = "flex-1 order-3  md:order-none">
        <h2 class = "font-bold font-quicksand">AFFLIATE SITES</h2>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">ICT Knowledge Portal</a>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">Central Business Portal</a>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">Digital Governance Awards</a>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">National Computer Emergency Response Team</a>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">Medium-Term Information Information and <br> Communications Technology Harmonization Initiative</a>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">Common Tower Registration Portal</a>
        <br>
        <a href = "#" class = "text-sm hover:text-sky-500">Workplace Learning and Development Platform</a>
      </div>

      <div class="flex-1 order-4 md:order-none">
        <h2 class = "font-bold font-quicksand">Send Message/Feedback</h2>
          <br>
        <livewire:forms.footer-form />
      </div>
    <div class="flex-1 order-2 md:order-none">
        <h2 class = "font-bold font-quicksand">Visitors</h2>
        <br>
        <div class="flex flex-col">
            <div class="flex gap-3">
                <img src="{{ asset('img/Group 3.svg') }}" alt="">
                <h2 class = "text-2xl font-quicksand font-black">19,560</h2>
            </div>
            <div class="font-quicksand flex flex-col mt-5 gap-2">
                <span class="text-sm flex items-center">Users today: <span class="font-bold text-base ml-2">123</span></span>
                <span class="text-sm flex items-center">Users this month: <span class="font-bold text-base ml-2">123</span></span>
            </div>
        </div>
      </div>
</div>
<div class= "w-full bg-[#2C2C2C] text-white text-sm p-10">
   <div class="flex flex-row container mx-auto ">
    <section class="w-full">
      <footer class="text-white w-full">
        <div class="w-full">
          <div class="flex justify-evenly gap-10 flex-wrap">
              <div class="">
                 <img
                  src="{{ asset('img/gov-seal2.png') }}"
                  class="w-[10rem] lg:w-[15rem]"/>
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

                  <ul class="list-unstyled mb-0">
                     <li>
                      <a href="#" class = 'hover:text-sky-500'>GOV.PH</a>
                     </li>
                      <li>
                         <a href="#" class = 'hover:text-sky-500'>Open Data Portal</a>
                      </li>
                      <li>
                         <a href="#" class = 'hover:text-sky-500'>Official Gazette</a>
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
                            <a href="#!" class = 'hover:text-sky-500'>Office of the Vice President</a>
                        </li>
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>Senate of the Philippines</a>
                        </li>
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>House of Representatives</a>
                        </li>
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>Official Gazette</a>
                        </li>
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>Supreme Court</a>
                        </li>
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>Sandiganbayan</a>
                        </li>
                    </ul>
                </div>
           </div>
        </div>
     </footer>
    </section>
   </div>
</div>

