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
