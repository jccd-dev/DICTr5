<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-metadata.header />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/admin/app.js', 'resources/js/utils/moment.js'])
</head>
<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
html::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
html {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
<body class="overflow-y-scroll overflow-x-hidden relative" x-data="data()">
        <x-admin.navbar>
        @if($errors->has('error'))
            <!-- Small Modal -->
            <div id="small-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Role Exception
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                {{ $errors->first('error') }}
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- nav -->
            <div class="flex flex-col flex-1 w-full">
                <x-admin.header />
                <main class="h-full pb-16 overflow-y-auto">
                    <div class="container px-6 mx-auto grid">
                        <h2
                            class="mb-6 text-5xl font-quicksand font-semibold text-gray-700 dark:text-gray-200"
                        >
                            @if(request()->routeIs('admin.cms.announcement')) {{'Announcement'}}
                            @elseif(request()->routeIs('admin.cms.calendar')) {{'Event Calendar'}}
                            @elseif(request()->routeIs('admin.dashboard')) {{'Dashboard'}}
                            @elseif(request()->routeIs('admin.exam-schedule')) {{'Exam Schedule'}}
                            @elseif(request()->routeIs('admin.cms.category')) {{'Category'}}
                            @elseif(request()->routeIs('admin.cms.slider')) {{'Slider'}}
                            @elseif(request()->routeIs('admin.cms.posts')) {{'Posts'}}
                            @elseif(request()->routeIs('admin.inbox')) {{'Inbox'}}
                            @elseif(request()->routeIs('admin.examinees')) {{'Exam Applicants'}}
                            @elseif(request()->routeIs('admin.accounts')) {{'Admin Accounts'}}
                            @elseif(request()->routeIs('admin.inbox')) {{'Inbox'}}
                            @elseif(request()->routeIs('admin.exam-schedule')) {{'Exam Schedule'}}
                            @elseif(request()->routeIs('admin.system-log')) {{'All Logs'}}
                            @elseif(request()->routeIs('examinee.get')) {{'Applicant Data'}}
                            @else {{'DICT Camarines Sur'}}
                            @endif
                        </h2>
                        <div id="main">
                            @if (isset($slot))
                                {{ $slot }}
                            @else
                                @yield('content')
                            @endif

                        </div>
                    </div>
                </main>
            </div>
        </x-admin.navbar>
        @vite('resources/js/utils/modal.js');
        <script>
            function data() {
                function getThemeFromLocalStorage() {
                    // if user already changed the theme, use it
                    if (window.localStorage.getItem('dark')) {
                        return JSON.parse(window.localStorage.getItem('dark'))
                    }

                    // else return their preferences
                    return (
                        !!window.matchMedia &&
                        window.matchMedia('(prefers-color-scheme: dark)').matches
                    )
                }

                function setThemeToLocalStorage(value) {
                    window.localStorage.setItem('dark', value)
                }

                return {
                    dark: getThemeFromLocalStorage(),
                    toggleTheme() {
                        this.dark = !this.dark
                        setThemeToLocalStorage(this.dark)
                    },
                    isSideMenuOpen: false,
                    toggleSideMenu() {
                        this.isSideMenuOpen = !this.isSideMenuOpen
                    },
                    closeSideMenu() {
                        this.isSideMenuOpen = false
                    },
                    isNotificationsMenuOpen: false,
                    toggleNotificationsMenu() {
                        this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                    },
                    closeNotificationsMenu() {
                        this.isNotificationsMenuOpen = false
                    },
                    isProfileMenuOpen: false,
                    toggleProfileMenu() {
                        this.isProfileMenuOpen = !this.isProfileMenuOpen
                    },
                    closeProfileMenu() {
                        this.isProfileMenuOpen = false
                    },
                    isPagesMenuOpen: false,
                    togglePagesMenu() {
                        this.isPagesMenuOpen = !this.isPagesMenuOpen
                    },
                    // Modal
                    isModalOpen: false,
                    trapCleanup: null,
                    openModal() {
                        this.isModalOpen = true
                        this.trapCleanup = focusTrap(document.querySelector('#modal'))
                    },
                    closeModal() {
                        this.isModalOpen = false
                        this.trapCleanup()
                    },
                }
            }

        </script>
    @livewireScripts
</body>
</html>
