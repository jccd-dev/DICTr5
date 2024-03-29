<nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-white font-quicksand border-b-4 border-b-blue-700 sticky top-0 left-0 w-full z-[1000]">
  <div class="mx-5 sm:mx-10 xl:mx-24">
    <div class="flex items-center justify-between h-12 2xl:h-16">
      <div class="flex items-center flex-grow">
        <div class="flex-shrink-0">
          <h1 class="text-base 2xl:text-lg font-bold tracking-wider text-black uppercase">
            <a href="#">GOVPH</a>
            <span class="mx-3 font-semibold hidden xl:inline-block">|</span>
          </h1>
        </div>
        <div class="hidden xl:block">
          <div class="flex items-center ">
            <a href="/" class="nav--top font-semibold flex flex-row items-center xl:px-2 2xl:px-3 py-2 text-sm text-black rounded-md focus:outline-none focus:text-black">
              <span class="ml-2">HOME</span>
            </a>
            {{-- <a href="#" class="flex flex-row items-center xl:px-2 2xl:px-3 py-2 ml-4 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
              <span class="ml-2">About Us</span>
            </a> --}}
            <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                <button class="nav--top font-semibold flex flex-row items-center xl:px-2 2xl:px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                  <span class="mx-2">About Us</span>
                  <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="display: none; z-index:100">
                  <div class="py-1 bg-white rounded-md shadow-xs">
                    <a href="{{url('/mandate-powers-and-functions')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Mandate, Powers and Function
                    </a>
                    <a href="{{url('/mission-vision')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Mission and Vision
                    </a>
                    <a href="{{url('/ra-10844')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Republic Act 10844
                    </a>

                    <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                        <a href="{{ url('/agency') }}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Attached Agencies
                            <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-90': open, '-rotate-90': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 left-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 101">
                            <a href="https://ntc.gov.ph/" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            National Telecommunication Commission (NTC)
                            </a>
                            <a href="https://privacy.gov.ph/" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            National Privacy Commission (NPC)
                            </a>
                            <a href="#https://dict.gov.ph/cybercrime-investigation-and-coordinating-center-cicc/" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Cybercrime Investigation and Coordinating Center (CICC)
                            </a>
                        </div>
                    </div>
                    <a href="https://dict.gov.ph/officials/" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Officials
                    </a>
                  </div>
                </div>
              </div>


            <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                <button class="nav--top font-semibold flex flex-row items-center xl:px-2 2xl:px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                  <span class="mx-2">Programs and Services</span>
                  <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="display: none; z-index:100">
                  <div class="py-1 bg-white rounded-md shadow-xs">
                    <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                        <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                          TECH4ED
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-90': open, '-rotate-90': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 left-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 101">
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Digital Literacy Training Courses Offered
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            List of Tech4ED Centers in Camarines Sur
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Webinar Calendar
                          </a>
                          <a data-modal-target="tech4ed_registration_modal" data-modal-toggle="tech4ed_registration_modal" class="cursor-pointer nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                              Registration Request
                          </a>
                          {{-- <livewire:homepage.section.tech4ed-registration />--}}
                        </div>
                      </div>
                    <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      FREE WIFI FOR ALL
                    </a>
                    <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      DIGITAL JOBS PH
                    </a>
                    <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                        <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                          ILCDB
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-90': open, '-rotate-90': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 left-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 100">
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Apply for Diagnostic Exam
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Apply for ICT Proficiency Exam
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Training Courses Offered
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Training Schedules
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Apply for Internship Program
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            FAQs
                          </a>
                        </div>
                      </div>
                      <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
                        <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                          PNPKI
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-90': open, '-rotate-90': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 left-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 101">
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            How to Avail
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Policies and Resources
                          </a>
                          <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            FAQs
                          </a>
                        </div>
                      </div>
                    <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      IBPLS
                    </a>
                    <a href="{{url('/government-web-hosting-service')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Government Web Hosting Services
                    </a>
                    <a href="{{url('/gov-mail')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      GovMail
                    </a>
                    <a href="{{url('/dict-gvcs')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Government Video Conferencing Service
                    </a>
                  </div>
                </div>
              </div>
            <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
              <button class="nav--top font-semibold flex flex-row items-center xl:px-2 2xl:px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                <span class="mx-2">News and Events</span>
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="z-index: 100">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <a href="#highlight-post-section" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                        WHAT'S NEW
                  </a>
                  <a href="#highlight-post-section" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    ARTICLES
                  </a>
                  <a href="#calendar-section" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    UPCOMING EVENTS
                  </a>
                  <a href="#calendar-section" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    CALENDAR OF EVENTS
                  </a>
                </div>
              </div>
            </div>
            <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
              <button class="nav--top font-semibold flex flex-row items-center xl:px-2 2xl:px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                <span class="mx-2">Contact Us</span>
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="z-index: 100">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    OFFICE DIRECTORY
                  </a>
                  <a href="{{url('/dict-cam-sur-address')}}" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    ADDRESS
                  </a>
                  <a href="mailto: ralph.talagtag@dict.gov.ph" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    EMAIL
                  </a>
                  <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    LOCATION MAP
                  </a>
                  <a href="#footer-section" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    DIRECT MESSAGE
                  </a>
                </div>
              </div>
            </div>
            <div class="relative" x-data="{ open: false}" x-on:mouseover="open = true" x-on:mouseleave="open = false">
              <button class="nav--top font-semibold flex flex-row items-center xl:px-2 2xl:px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                <span class="mx-2">Resources</span>
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="z-index: 100">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    FAQS
                  </a>
                  <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    DOWNLOADABLE FORMS
                  </a>
                  <a href="#" class="nav--top font-medium flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    AFFILIATED SITES
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden xl:block">
        <div class="flex justify-center">
            <div class="relative">
                <div class="absolute top-1/2 left-3 -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#474747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input type="search" name="" id="search_input" class="xl:w-36 2xl:w-56 bg-[#00509D] bg-opacity-5 px-3 pl-10 py-2 rounded-md text-[#474747] text-sm" placeholder="Search">
            </div>

        </div>
      </div>
      <div class="flex -mr-2 xl:hidden">
        <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-black  focus:outline-none focus:text-black" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open">
          <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  <div :class="{'block': open, 'hidden': !open}" class="hidden xl:hidden">
    <div class="container px-6 mx-auto">
      <div class="pt-2 pb-3">
            <a href="#" class="flex flex-row items-center px-3 py-2 text-sm text-black rounded-md focus:outline-none focus:text-black">
              <span class="ml-2">HOME</span>
            </a>
            {{-- <a href="#" class="flex flex-row items-center px-3 py-2 ml-4 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
              <span class="ml-2">About Us</span>
            </a> --}}
            <div class="relative" x-data="{ open: false}">
                <button @click="open = !open" class="flex flex-row items-center px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                  <span class="mx-2">About Us</span>
                  <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="display: none; z-index:100">
                  <div class="py-1 bg-white rounded-md shadow-xs">
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Mandate, Powers and Function
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Mission and Vision
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Republic Act 10844
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Attached Agencies
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Officials
                    </a>
                  </div>
                </div>
              </div>
            <div class="relative" x-data="{ open: false}">
                <button @click="open = !open" class="flex flex-row items-center px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                  <span class="mx-2">Programs and Services</span>
                  <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="display: none; z-index:100">
                  <div class="py-1 bg-white rounded-md shadow-xs">
                    <div class="relative" x-data="{ open: false}">
                        <a href="#" @click="open = !open" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                          TECH4ED
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 -right-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 101">
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Digital Literacy Training Courses Offered
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            List of Tech4ED Centers in Camarines Sur
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Webinar Calendar
                          </a>
                        </div>
                      </div>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      FREE WIFI FOR ALL
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      DIGITAL JOBS PH
                    </a>
                    <div class="relative" x-data="{ open: false}">
                        <a href="#" @click="open = !open" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                          ILCDB
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 -right-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 101">
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Apply for Diagnostic Exam
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Apply for ICT Proficiency Exam
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Training Courses Offered
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Training Schedules
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Apply for Internship Program
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            FAQs
                          </a>
                        </div>
                      </div>
                      <div class="relative" x-data="{ open: false}">
                        <a href="#" @click="open = !open" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                          PNPKI
                          <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 ml-2 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute top-0 -right-full w-full origin-top-left rounded-md shadow-lg bg-white" style="z-index: 101">
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            How to Avail
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            Policies and Resources
                          </a>
                          <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                            FAQs
                          </a>
                        </div>
                      </div>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      IBPLS
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Government Web Hosting Services
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      GovMail
                    </a>
                    <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                      Government Video Conferencing Service
                    </a>
                  </div>
                </div>
              </div>


            <div class="relative" x-data="{ open: false}">
              <button @click="open = !open" class="flex flex-row items-center px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                <span class="mx-2">News and Events</span>
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="z-index: 100">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                        WHAT'S NEW
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    ARTICLES
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    UPCOMING EVENTS
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    CALENDAR EVENTS
                  </a>
                </div>
              </div>
            </div>
            <div class="relative" x-data="{ open: false}">
              <button @click="open = !open" class="flex flex-row items-center px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                <span class="mx-2">Contact Us</span>
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="z-index: 100">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    OFFICE DIRECTORY
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    ADDRESS
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    EMAIL
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    LOCATION MAP
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    DIRECT MESSAGE
                  </a>
                </div>
              </div>
            </div>
            <div class="relative" x-data="{ open: false}">
              <button @click="open = !open" class="flex flex-row items-center px-3 py-2 text-sm text-black rounded-md hover:text-black  focus:outline-none focus:text-black">
                <span class="mx-2">Resources</span>
                <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div @click.away="open = false" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opaity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute left-0 w-48 origin-top-right rounded-md shadow-lg" style="z-index: 100">
                <div class="py-1 bg-white rounded-md shadow-xs">
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    FAQS
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    DOWNLOADABLE FORMS
                  </a>
                  <a href="#" class="flex flex-row items-center px-4 py-2 text-sm text-gray-700 focus:text-gray-900 hover:text-gray-900 focus:outline-none hover:bg-gray-100 focus:bg-gray-100">
                    AFFILIATED SITES
                  </a>
                </div>
              </div>
            </div>
      </div>
    </div>
    <div class="container px-6 mx-auto">
      <div x-data="{ open: false }" class="py-4 border-t border-gray-700">
        <button @click="open = true" class="flex items-center w-full focus:outline-none">
          <div class="flex items-center w-full text-left">
            <div class="flex-shrink-0">
              <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-black">Tom Cook</div>
              <div class="mt-1 text-sm font-medium leading-none text-gray-400">tom@example.com</div>
            </div>
          </div>
          <div class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open, 'rotate-0': !open}" class="w-4 h-4 mt-1 transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </div>
        </button>
        <div x-show="open" @click.away="open = false"  class="py-2 mt-4 bg-white rounded-md shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">
          <a href="#" class="flex flex-row items-center px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="ml-2">Your Profile</span>
          </a>
          <a href="#" class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:text-gray-900 focus:bg-gray-200" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <span class="ml-2">Settings</span>
          </a>
          <a href="#" class="flex flex-row items-center px-3 py-2 mt-1 text-base font-medium text-red-500 rounded-md hover:text-red-700 hover:bg-red-200 focus:outline-none focus:text-red-700 focus:bg-red-200" role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            <span class="ml-2">Sign out</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Tech4Ed modal -->
<div id="tech4ed_registration_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tech4Ed Registration
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tech4ed_registration_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <livewire:homepage.section.tech4ed-registration />
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#search_input').keypress(function(event) {
            if (event.which === 13) {
                // Execute your desired function here
                // console.log('');
                var url = '{{route('view.search_result')}}';
                window.location.href = url+'?search='+$('#search_input').val();
            }
        });
    });
</script>

