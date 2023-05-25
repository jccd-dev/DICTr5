<div
    class="flex h-screen bg-[#F2F7FF] dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
    x-data="{ isCMSOpen: '{{ request()->is('admin/cms/*') }}' }"
>

    <!-- Desktop sidebar -->
    <aside
        class="z-20 hidden w-80 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 px-5"
    >
        <div class="py-4 pt-12 px-5 text-gray-500 dark:text-gray-400">
            <a
                class="text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#"
            >
                <img src="{{ asset("img/DICT Standard Logos-05 1.png") }}" alt="">
            </a>
            <ul class="mt-14">
                <li class="relative py-1">
                    <div class="{{ request()->routeIs('admin.dashboard') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.dashboard') }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                            <span
                                class="ml-4 font-semibold text-base font-quicksand"
                            >
                                Dashboard
                            </span>
                        </a>
                    </div>
                </li>
            </ul>
            <ul>
                <li class="relative py-2">
                    <div class="{{ request()->is('admin/cms/*') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm"
                            @click="isCMSOpen = !isCMSOpen"
                            aria-haspopup="true"
                        >
                            <span class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span
                                  class="ml-4 font-semibold text-base"
                                  style="font-family: Quicksand,serif">CMS
                                </span>
                            </span>
                            <svg
                                class="w-4 h-4"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </div>
                    <template x-if="isCMSOpen">
                        <ul
                            x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 pl-14 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md dark:text-gray-400"
                            aria-label="submenu"
                        >
                            <li
                                class="{{ request()->routeIs('admin.cms.posts') ? 'text-custom-blue' : 'hover:text-gray-800' }} px-2 py-1 transition-colors duration-150"
                            >
                                <a class="w-full" href="{{ url("/admin/cms/posts") }}">Posts</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.cms.slider') ? 'text-custom-blue' : 'hover:text-gray-800' }} px-2 py-1 transition-colors duration-150"
                            >
                                <a class="w-full" href="{{ route("admin.cms.slider") }}">
                                    Slider
                                </a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.cms.announcement') ? 'text-custom-blue' : 'hover:text-gray-800' }} px-2 py-1 transition-colors duration-150"
                            >
                                <a class="w-full" href="{{route('admin.cms.announcement')}}">Announcement</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.cms.calendar') ? 'text-custom-blue' : 'hover:text-gray-800' }} px-2 py-1 transition-colors duration-150"
                            >
                                <a class="w-full" href="{{route('admin.cms.calendar')}}">Event Calendar</a>
                            </li>
                            <li
                                class="{{ request()->routeIs('admin.cms.category') ? 'text-custom-blue' : 'hover:text-gray-800' }} px-2 py-1 transition-colors duration-150"
                            >
                                <a class="w-full" href="{{route('admin.cms.category')}}">Category</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/forgot-password.html">
                                    Forgot password
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/blank.html">Blank</a>
                            </li>
                        </ul>
                    </template>
                </li>
                <li class="relative py-2">
                    <div class="{{ request()->routeIs('admin.inbox') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.inbox') }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                            <span
                                class="ml-4 font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    Inbox
                  </span>
                        </a>
                    </div>
                </li>
                <li class="relative py-2">
                    <div class="{{ request()->routeIs('admin.accounts') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.accounts') }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span
                                class="ml-4 font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    Admin
                  </span>
                        </a>
                    </div>
                </li>
                <li class="relative py-2">
                    <div class="{{ request()->routeIs('admin.examinees') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.examinees') }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span
                                class="ml-4 font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    Exam Applicants
                  </span>
                        </a>
                    </div>
                </li>
                <li class="relative py-2">
                    <div class="{{ request()->routeIs('admin.exam-schedule') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.exam-schedule') }}"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                ></path>
                            </svg>
                            <span
                                class="ml-4 font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    Exam Schedule
                  </span>
                        </a>
                    </div>
                </li>
                <li class="relative py-2">
                    <div class="{{ request()->routeIs('admin.dashboard') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.dashboard') }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                            <span
                                class="ml-4 font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    All Logs
                  </span>
                        </a>
                    </div>
                </li>
                <li class="relative py-2">
                    <div class="{{ request()->routeIs('admin.dashboard') ? 'bg-[#00509D] text-white' : 'text-gray-500 hover:text-gray-800' }} transition-colors duration-150 px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm "

                            href="{{ route('admin.dashboard') }}"
                        >
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                ></path>
                            </svg>
                            <span
                                class="ml-4 font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    Calendar of Activities
                  </span>
                        </a>
                    </div>
                </li>
            </ul>
            <div class="px-6 my-6">
                <button
                    class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Create account
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </div>
        </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    ></div>
    <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
    >
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#"
            >
                Windmill
            </a>
            <ul class="mt-16">
                <li class="relative px-5 py-1">
                    <div class="bg-[#00509D] px-4 py-3 flex items-center rounded-lg">
                        <a
                            class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                            href="index.html"
                        >
                            <svg
                                class="w-5 h-5 text-white"
                                aria-hidden="true"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                ></path>
                            </svg>
                            <span
                                class="ml-4 text-white font-semibold text-base"
                                style="font-family: Quicksand"
                            >
                    Dashboard
                  </span>
                        </a>
                    </div>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                    <a
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="forms.html"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                            ></path>
                        </svg>
                        <span class="ml-4">Forms</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <a
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="cards.html"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                            ></path>
                        </svg>
                        <span class="ml-4">Cards</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <a
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="charts.html"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                            ></path>
                            <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                        <span class="ml-4">Charts</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <a
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="buttons.html"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                            ></path>
                        </svg>
                        <span class="ml-4">Buttons</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <a
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="modals.html"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                            ></path>
                        </svg>
                        <span class="ml-4">Modals</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <a
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="tables.html"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="ml-4">Tables</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="togglePagesMenu"
                        aria-haspopup="true"
                    >
                <span class="inline-flex items-center">
                  <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                  >
                    <path
                        d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    ></path>
                  </svg>
                  <span class="ml-4">Pages</span>
                </span>
                        <svg
                            class="w-4 h-4"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <template x-if="isPagesMenuOpen">
                        <ul
                            x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu"
                        >
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/login.html">Login</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/create-account.html">
                                    Create account
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/forgot-password.html">
                                    Forgot password
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/404.html">404</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <a class="w-full" href="pages/blank.html">Blank</a>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
            <div class="px-6 my-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Create account
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </div>
        </div>
    </aside>
    {{ $slot }}
</div>
