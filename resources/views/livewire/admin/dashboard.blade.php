<div>
    <style>
        .swiper {
            width: 600px;
        }
        .swiper-button-prev,
        .swiper-button-next {
            transform: scale(.6) !important;
            color: white !important;
        }

    </style>
    <!-- admin credentials can be access using this;-->
    {{-- @if(auth('jwt')->user()->name != null)
        {{auth('jwt')->user()->name}}
        <br>
    @endif --}}

    <!-- admin credentials can be access using this;-->
    {{-- @can('admins_only', auth('jwt')->user())
        <div style="font-size: 1rem; font-weight: bold">Admins Only</div>
    @endcan --}}


    {{-- Admin Dashboard
    @if($role === 100)
        <h2>Super Admin Features</h2>
        <h5>{{$name}}</h5>
        <ul>
            <li>Manage System Settings</li>
            <li>Create and Manage Admin Accounts</li>
        </ul>
    @endif

    @if($role === 200)
        <h2>Admin Features</h2>
        <ul>
            <li>Manage User Accounts</li>
            <li>Create and Manage Products</li>
        </ul>
    @endif

    @if($role === 300)
        <h2>Creator Features</h2>
        <ul>
            <li>Create and Manage Content</li>
            <li>View Analytics and Metrics</li>
        </ul>
    @endif --}}
    <div class="w-full flex gap-5">
        <div class="flex flex-col gap-10 h-fit w-3/5">
            <div class="flex gap-10">
                <div class="card p-5 rounded-xl bg-white w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[4rem] h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/Group 39.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-3xl">12</div>
                        <div class="font-inter text-sm text-slate-600">Exam Applicants</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
                <div class="card p-5 rounded-xl bg-white w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[4rem] h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/ico/Group 39-2.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-3xl">12</div>
                        <div class="font-inter text-sm text-slate-600">Total Examiners</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class="flex gap-10">
                <div class="card p-5 rounded-xl bg-white w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[4rem] h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/ico/Group 39.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-3xl">12</div>
                        <div class="font-inter text-sm text-slate-600">Complete Requirements</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
                <div class="card p-5 rounded-xl bg-white w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[4rem] h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/ico/Group 39-1.svg') }}" alt="">

                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-3xl">12</div>
                        <div class="font-inter text-sm text-slate-600">Pending Requirements</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider main container -->

        <div class="swiper w-2/5 rounded-3xl">
        <!-- Additional required wrapper -->
            <div class="swiper-wrapper w-full">
            <!-- Slides -->
                <div class="swiper-slide w-full">
                    <div class="w-full h-full bg-custom-blue rounded-3xl p-5 pb-3 flex flex-col justify-between">
                        <div class="flex gap-5 text-white font-quicksand">
                            <div>
                                <img src="{{ asset('img/ico/Group 43.svg') }}" alt="">
                            </div>
                            <div class="flex flex-col gap-2 text-lg font-medium">
                                <div>
                                    <span>Venue:</span>
                                    <span>Jesse M. Robredo Coliseum, Naga City</span>
                                </div>
                                <div>
                                    <span>Date:</span>
                                    <span>March 29, 2023</span>
                                </div>
                                <div>
                                    <span>Time:</span>
                                    <span>8:00 am</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <div class="flex gap-5 w-full">
                                <a href="#" class="bg-white py-3 flex-1 text-center rounded-lg">
                                    Exam Details
                                </a>

                                <a href="#" class="border border-white py-3 flex-1 text-center rounded-lg text-white">
                                    Add Exam
                                </a>
                            </div>
                            <div>
                                <span class="flex gap-2 justify-center items-center text-white font-quicksand font-medium"><span class="flex w-3 h-3 bg-green-500 rounded-full"></span> Active Date</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-full">
                    <div class="w-full h-full bg-custom-blue rounded-3xl p-5 pb-3 flex flex-col justify-between">
                        <div class="flex gap-5 text-white font-quicksand">
                            <div>
                                <img src="{{ asset('img/ico/Group 43.svg') }}" alt="">
                            </div>
                            <div class="flex flex-col gap-2 text-lg font-medium">
                                <div>
                                    <span>Venue:</span>
                                    <span>Jesse M. Robredo Coliseum, Naga City</span>
                                </div>
                                <div>
                                    <span>Date:</span>
                                    <span>March 29, 2023</span>
                                </div>
                                <div>
                                    <span>Time:</span>
                                    <span>8:00 am</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <div class="flex gap-5 w-full">
                                <a href="#" class="bg-white py-3 flex-1 text-center rounded-lg">
                                    Exam Details
                                </a>

                                <a href="#" class="border border-white py-3 flex-1 text-center rounded-lg text-white">
                                    Add Exam
                                </a>
                            </div>
                            <div>
                                <span class="flex gap-2 justify-center items-center text-white font-quicksand font-medium"><span class="flex w-3 h-3 bg-green-500 rounded-full"></span> Active Date</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
    <div class="w-full bg-white mt-16 p-10 px-14 rounded-3xl">
        <div>
            <h1 class="font-quicksand font-bold text-3xl">Exam Statistics</h1>
        </div>
        <div class="p-20">
            <canvas id="adminChart"></canvas>
        </div>
    </div>
    <script>
        let chart = document.querySelector('#adminChart')

        const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        new Chart(chart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Number of applicant passed',
                        data: [12, 19, 3, 5, 2, 3,7,4,9,2,12,19],
                        borderColor: 'rgba(0,80,157, 1)',
                        backgroundColor: 'rgba(0,80,157,0.4)',
                        borderWidth: 2,
                        borderRadius: Number.MAX_VALUE,
                        borderSkipped: false,
                        barPercentage: 0.5
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    },
                },
                responsive: true,
                plugins: {
                    title: {
                        display: false,
                    }
                }
            }
        });
    </script>
    @vite('resources/js/admin/dashboard.js')
</div>
