<div>
    <style>
        .swiper {
            /* width: 100%; */
        }
        .swiper-button-prev,
        .swiper-button-next {
            transform: scale(.6) !important;
            color: white !important;
        }
    </style>
    {{-- @dd($exam_sched) --}}
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
    <div class="w-full flex gap-2 2xl:gap-5">
        <div class="flex flex-col gap-5 w-1/2 2xl:gap-10 h-fit 2xl:w-[60%]">
            <div class="flex gap-5 2xl:gap-10">
                <div class="card p-3 2xl:p-5 rounded-xl bg-white w-[17.5rem] 2xl:w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[3.25rem] h-[3.25rem] 2xl:w-[4rem] 2xl:h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/Group 39.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-2xl 2xl:text-3xl">{{ $data['applicants'] }}</div>
                        <div class="font-inter lg:text-xs 2xl:text-sm text-slate-600">Exam Applicants</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
                <div class="card p-3 2xl:p-5 rounded-xl bg-white w-[17.5rem] 2xl:w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[3.25rem] h-[3.25rem] 2xl:w-[4rem] 2xl:h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/ico/Group 39-2.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-2xl 2xl:text-3xl">{{ $data['examinees'] }}</div>
                        <div class="font-inter lg:text-xs 2xl:text-sm text-slate-600">Total Examiners</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class="flex gap-5 2xl:gap-10">
                <div class="card p-3 2xl:p-5 rounded-xl bg-white w-[17.5rem] 2xl:w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[3.25rem] h-[3.25rem] 2xl:w-[4rem] 2xl:h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/ico/Group 39.svg') }}" alt="">
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-2xl 2xl:text-3xl">{{ $data['complete'] }}</div>
                        <div class="font-inter lg:text-xs 2xl:text-sm text-slate-600">Complete Requirements</div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-custom-blue w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                </div>
                <div class="card p-3 2xl:p-5 rounded-xl bg-white w-[17.5rem] 2xl:w-[25rem] flex gap-5 items-center">
                    <div class="flex w-[3.25rem] h-[3.25rem] 2xl:w-[4rem] 2xl:h-[4rem]">
                        <img class="w-full h-full object-fit" src="{{ asset('img/ico/Group 39-1.svg') }}" alt="">

                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="font-inter font-bold text-2xl 2xl:text-3xl">{{ $data['pending'] }}</div>
                        <div class="font-inter lg:text-xs 2xl:text-sm text-slate-600">Pending Requirements</div>
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

        <div class="swiper rounded-3xl w-[25rem] 2xl:w-[30rem]">
        <!-- Additional required wrapper -->
            <div class="swiper-wrapper w-full">
            <!-- Slides -->
                @foreach ($exam_sched as $item)
                    <div class="swiper-slide w-full">
                        <div class="w-full h-full bg-custom-blue rounded-3xl p-5 pb-3 flex flex-col justify-between">
                            <div class="flex gap-3 text-white font-quicksand">
                                <div>
                                    <img src="{{ asset('img/ico/Group 43.svg') }}" alt="">
                                </div>
                                <div class="flex flex-col gap-0 2xl:gap-2 text-lg font-medium">
                                    <div>
                                        <span class="text-sm 2xl:text-base">Venue:</span>
                                        <span class="text-sm 2xl:text-base">{{ $item->venue }}</span>
                                    </div>
                                    <div>
                                        <span class="text-sm 2xl:text-base">Date:</span>
                                        <span class="text-sm 2xl:text-base">{{ date('F j, Y', strtotime($item->start_date)) }}</span>
                                    </div>
                                    <div>
                                        <span class="text-sm 2xl:text-base">Time:</span>
                                        <span class="text-sm 2xl:text-base">{{ date('g:i a', strtotime($item->start_date)) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-2 flex-col gap-1">
                                <div class="flex gap-5 w-full">
                                    <a href="{{ url('/admin/exam-schedule/'.$item->exam_set) }}" class="bg-white text-sm 2xl:text-base py-2 2xl:py-3 flex-1 text-center rounded-lg">
                                        Exam Details
                                    </a>

                                    <a href="{{ url('/admin/exam-schedule') }}" class="border border-white text-sm 2xl:text-base py-2 2xl:py-3 flex-1 text-center rounded-lg text-white">
                                        Add Exam
                                    </a>
                                </div>
                                <div>
                                    <span class="flex gap-2 justify-center items-center text-white font-quicksand font-medium text-sm 2xl:text-base"><span class="flex w-3 h-3 bg-green-500 rounded-full"></span> Active Date</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
