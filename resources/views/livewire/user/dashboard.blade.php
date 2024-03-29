<div class="container relative mx-auto px-4 py-10 flex flex-col lg:flex-row gap-7" x-data="{ state: 1, hasVidData: false, err: [], currentStatus: '{{ $currentStatus ?: 'professional' }}', isFiles: false, exam_status_id: '', exam_history: [] }">

{{--  main  --}}
@if(session()->has('warning') || session()->has('erorr') || session()->has('success'))
<div id="dismiss-alert" wire:ignore class="w-full text-white
    {{ session()->has('success') ? 'bg-emerald-500' : '' }}
    {{ session()->has('warning') ? 'bg-orange-500' : '' }}
    {{ session()->has('error') ? 'bg-red-500' : '' }}
    fixed top-0 right-0 z-[1000]">
    <div class="container relative flex items-center justify-between px-6 py-4 mx-auto">
        <div class="flex">
            <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                </path>
            </svg>
            <p class="mx-3" id="message-alert">
                {{ session()->has('success') ? session()->get('success') : '' }}
                {{ session()->has('error') ? session()->get('error') : '' }}
                {{ session()->has('warning') ? session()->get('warning') : '' }}
            </p>
        </div>

        <button id="closeAlertBtn" class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>
@endif
    <div id="dismiss-alert" wire:ignore class="w-full hidden text-white bg-emerald-500 fixed top-0 right-0 z-[1000]">
        <div class="container relative flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex">
                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                    </path>
                </svg>
                <p class="mx-3" id="message-alert"></p>
            </div>

            <button id="closeAlertBtn" class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
    {{-- @dd($sched) --}}
    <div class="basis-3/4">
        <div class="flex flex-col lg:flex-row rounded-3xl bg-darker-blue text-white p-14 gap-14 lg:gap-7 justify-between pb-20 lg:pb-36">
            <div class="flex flex-col">
                <div class="flex gap-7 flex-col 2xl:flex-row relative">
                    <div>
                        <img src="{{ asset('img/Group 44.svg') }}" alt="">
                    </div>
                    <div class="font-quicksand flex flex-col">
                        @if (isset($user_data[0]) && isset($user_data[0]->regDetails))
                            @switch($user_data[0]->regDetails->status)
                                @case(1)
                                    <span class="flex gap-10 items-center"><h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                                        <span class="absolute top-10 right-0 2xl:top-0 flex items-center text-sm font-medium text-white 2xl:relative">
                                            <span class="flex w-2.5 h-2.5 bg-custom-red rounded-full mr-1.5 flex-shrink-0"></span>
                                            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button" class="flex gap-2">Disapproved<svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                        </span>
                                    </span>
                                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Your Application has been Disapproved</h3>
                                            <p>Your application does not met the guidelines or you have cancelled your examination.</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @break
                                @case(2)
                                    <span class="flex gap-10 items-center"><h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                                        <span class="absolute top-10 right-0 2xl:top-0 flex items-center text-sm font-medium text-white 2xl:relative">
                                            <span class="flex w-2.5 h-2.5 bg-custom-red rounded-full mr-1.5 flex-shrink-0"></span>
                                            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button" class="flex gap-2">Incomplete Requirements<svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                        </span>
                                    </span>
                                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Your Application in Incomplete</h3>
                                            <p>Please upload all the requirements needed to qualify for the ICT Diagnostic Exam.</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @break
                                @case(3)
                                    <span class="flex gap-10 items-center"><h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                                        <span class="absolute top-10 right-0 2xl:top-0 flex items-center text-sm font-medium text-white 2xl:relative">
                                            <span class="flex w-2.5 h-2.5 bg-custom-yellow rounded-full mr-1.5 flex-shrink-0"></span>
                                            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button" class="flex gap-2">For Evaluation <svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                        </span>
                                    </span>
                                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Your Application is for Evaluation</h3>
                                            <p>Please standby for the confirmation. Regularly check your dashboard or email for the confirmation</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @break
                                @case(4)
                                    <span class="flex gap-10 items-center"><h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                                        <span class="absolute top-10 right-0 2xl:top-0 flex items-center text-sm font-medium text-white 2xl:relative">
                                            <span class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>
                                            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button" class="flex gap-2">Approved<svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                        </span>
                                    </span>
                                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Your Application has been Approved</h3>
                                            <p>Please standby for the schedule and venue of exam. Regularly check your dashboard or email for the confirmation</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @break
                                @case(5)
                                    <span class="flex gap-10 items-center"><h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                                        <span class="absolute top-10 right-0 2xl:top-0 flex items-center text-sm font-medium text-white 2xl:relative">
                                            <span class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>
                                            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button" class="flex gap-2">Scheduled for Exam<svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                        </span>
                                    </span>
                                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Your Schedule for Exam has been set</h3>
                                            <p>Please check the upcomming exam section below for details.</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @break
                                @case(6)
                                    <span class="flex gap-10 items-center"><h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                                        <span class="absolute top-10 right-0 2xl:top-0 flex items-center text-sm font-medium text-white 2xl:relative">
                                            <span class="flex w-2.5 h-2.5 bg-orange-500 rounded-full mr-1.5 flex-shrink-0"></span>
                                            <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button" class="flex gap-2">Waiting for Result <svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                        </span>
                                    </span>
                                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Waiting for Result</h3>
                                            <p>Please wait for your result to be released. Regularly check the dashboard for the result.</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                    @break
                                @default
                                    <h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>

                            @endswitch
                        @else
                            <h1 class="font-bold text-3xl">{{ $user->fname }} {{ str_replace(",", "", $user->lname) }}</h1>
                        @endif
                        <a href="mailto:{{ $user->email }}" class="hover:underline">{{ $user->email }}</a>
                        <span>Professional</span>
                        <div class="flex gap-5 mt-10">
                            <div class="flex flex-col gap-2">
                                <span>Date of Birth:</span>
                                <span>Gender</span>
                                <span>Address</span>
                                <span>Telephone No.</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <span class="font-semibold">{{ isset($user_data[0]->date_of_birth) ? date('F j, Y',strtotime($user_data[0]->date_of_birth)) : "N/A" }}</span>
                                <span class="font-semibold">{{ isset($user_data[0]->gender) ? $user_data[0]->gender : "N/A" }}</span>
                                <span class="font-semibold">
                                    @php
                                        if(isset($user_data[0]->addresses)) {
                                            echo $user_data[0]->addresses->barangay . ", ";
                                            echo $user_data[0]->addresses->municipality . ", ";
                                            echo $user_data[0]->addresses->province . ", ";
                                            echo $user_data[0]->addresses->region;
                                        } else {
                                            echo "N/A";
                                        }
                                    @endphp
                                </span>
                                <span class="font-semibold">{{ isset($user_data[0]->contact_number) ? $user_data[0]->contact_number : "N/A" }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @dd($user_data) --}}
            <div class="flex flex-col font-quicksand max-w-[15rem] gap-3">
                @if(isset($user_data) && count($user_data))
                    <button type="button" id="update-form-btn" class="py-4 px-5 bg-custom-red font-semibold" @click="$openModal('cardModal'); isFiles = false" wire:click="populate_user_data">
                            Update Exam Form
                    </button>
                    @if (!isset($user_data[0]->regDetails) || $user_data[0]->regDetails->apply === 2)
                        <button type="button" id="update-form-btn" class="py-4 px-5 bg-custom-red font-semibold" wire:click="apply({{ $user_data[0]->id }})" wire:ignore>
                            @php
                                if(isset($userData->userHistory)) {
                                    if($userData->userHistory->status === 'passed') {
                                        echo "Already passed the exam";
                                    } else {
                                        echo "Reapply for Exam";
                                    }
                                } else {
                                    echo "Apply for Exam";
                                }
                            @endphp
                        </button>
                    @endif
                @else
                    <button type="button" id="register-form-btn"  class="py-4 px-5 bg-custom-red font-semibold" @click="$openModal('cardModal'); isFiles = false">
                            Register Exam
                    </button>
                @endif
                <button type="button" wire:click="generate_pdf" class="py-4 px-5 bg-dark-yellow font-semibold text-black">Download Completed Examination Form</button>
            </div>
        </div>

{{--    Upcoming Exam    --}}
        <div class="my-5">
            <span class="text-lg font-bold my-5">Upcoming Exam</span><br>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Date of Exam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Venue
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            @if (isset($sched))
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ date('F j, Y',strtotime($sched->start_date)) }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ date('h:i a',strtotime($sched->start_date)) }} - {{ date('h:i a',strtotime($sched->end_date)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $sched->venue }}
                                </td>
                            @else
                                <td colspan="3" class="px-6 py-4 text-center">
                                    No Upcoming Exam
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br>
            <span class="text-lg font-bold">Exam History</span><br>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Registration Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Set
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Venue
                        </th>
                        <th scope="col" class="px-6 py-3 w-44">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Result
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (isset($user_data[0]->userHistory) && count($user_data[0]->userHistory) > 0)
                            @foreach ($user_data[0]->userHistory as $item)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ date("F j, Y", strtotime($item->registration_date)) }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->exam_set }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date("m-d-Y", strtotime($item->schedule)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->venue }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @switch($item->exam_result)
                                            @case('passed')
                                                <span class="bg-[#65E02B] text-black text-xs py-1 px-3 font-semibold rounded">Passed</span> <br>
                                                @break
                                            @case('failed')
                                                <span class="bg-[#E35F00] text-white text-xs py-1 px-3 font-semibold rounded">Failed</span>
                                                @break
                                            @default

                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" @click="$wire.get_user_history({{ $item->id }})" data-modal-target="failed_modal" wire:click="" data-modal-toggle="failed_modal" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-3 py-1 text-center">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif(isset($user_data[0]->regDetails) && $user_data[0]->regDetails->status == 6)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ date("F j, Y", strtotime($user_data[0]->regDetails->reg_date)) }}
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                        <span class="bg-[#00509D] text-white text-xs py-1 px-3 font-semibold rounded">Waiting for Result</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" data-modal-target="failed_modal" wire:click="" data-modal-toggle="failed_modal" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-3 py-1 text-center">View</button>
                                </td>
                            </tr>
                        @else
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    No Exam History
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Templates for status --}}
            {{-- START --}}

            {{-- <span class="bg-[#E35F00] text-white text-xs py-1 px-3 font-semibold rounded">Incomplete Req.</span> --}}
            {{-- <span class="bg-[#C1121F] text-white text-xs py-1 px-3 font-semibold rounded">Disapprove</span> --}}
            {{-- <span class="bg-[#FFD500] text-black text-xs py-1 px-3 font-semibold rounded">For Evaluation</span> <br> --}}
            {{-- <span class="bg-[#65E02B] text-black text-xs py-1 px-3 font-semibold rounded">Approved</span> <br> --}}
            {{-- <span class="bg-[#00509D] text-white text-xs py-1 px-3 font-semibold rounded">Waiting for Result</span> <br> --}}

            {{-- END --}}
        </div>
    </div>

{{--  right pane  --}}

    <div class="basis-1/4 font-quicksand flex flex-col gap-10">

        <div>
            <h1 class="font-bold text-xl">Downloadable Forms/Documents</h1>
            <br>
            <div class="ml-5 flex flex-col gap-3 text-sm">

                <a href="#" class="font-semibold hover:underline flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-dark-blue">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>

                    <span>
                        Frequently Asked Questions
                    </span>
                </a>
                <a href="#" class="font-semibold hover:underline flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-dark-blue">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>

                    <span>
                        Application Form
                    </span>
                </a>
                <a href="#" class="font-semibold hover:underline flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-dark-blue">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>

                    <span>
                        Transcript
                    </span>
                </a>


            </div>
        </div>
        <div>
            <h1 class="font-bold text-xl">Uploaded Files</h1>
            <br>
            @if(isset($user_data) && count($user_data))
            <button type="button" id="update-file-btn"  class="py-2 px-4 text-white bg-custom-red rounded-xl font-semibold text-sm" @click="$openModal('cardModal'); isFiles = true" wire:click="populate_user_data">
                Update Submitted Files
            </button>
            <br>
            <br>
            @endif
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th colspan="2" scope="col" class="px-6 py-3">
                            File Name
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($user_data as $us)
                        @forelse($us->submittedFiles as $file)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="flex flex-row px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                    </svg>
                                    {{$file->file_name}}
                                </th>
                                <td class="">
                                    <a href="{{asset('storage/fileSubmits/'.$file->file_name)}}" target="_blank" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>

            <br>

            <div class="rounded-lg bg-[#D9D9D9] p-3 px-5">
                <h4 class="font-bold mb-3">How to register?</h4>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Login with your google account.</li>
                    <li class="mb-1">Click the Register Button and fill out all the required input fields. If you are priviously registered and wants to retake the exam, you can do so by updating your data..</li>
                    <li class="mb-1">Click the Apply Button.</li>
                    <li class="mb-1">Then, wait for an email about your registration status. </li>
                </ol>

                <h4 class="font-bold mb-3">Requirements</h4>
                <h6>For Professionals:</h6>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Passport Size Photo with label (Surname, Given Name, Middle Name. You can visit this site to resize your photo through <a href="https://www.persofoto.com/upload/passport-photo" class="italic" target="_blank">Persofoto</a>.</li>
                    <li class="mb-1">Valid ID.</li>
                    <li class="mb-1">Diploma or TOR.</li>
                </ol>
                <h6>For Undergraduate Students </h6>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Passport Size Photo with label (Surname, Given Name, Middle Name. You can visit this site to resize your photo through <a href="https://www.persofoto.com/upload/passport-photo" class="italic" target="_blank">Persofoto</a>.</li>
                    <li class="mb-1">COE or COG.</li>
                    <li class="mb-1">PSA Birth Certificate.</li>
                </ol>
                <h4 class="font-bold mb-3">Coverage of Exam</h4>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Program Simulation</li>
                    <li class="mb-1">Number System</li>
                    <li class="mb-1">Data Structures</li>
                    <li class="mb-1">System Development Life Cycle </li>
                    <li class="mb-1">OOP Concepts </li>
                    <li class="mb-1">Networking Concepts </li>
                    <li class="mb-1">File Acces Methods </li>
                    <li class="mb-1">Database </li>
                    <li class="mb-1">Loops </li>
                    <li class="mb-1">Array </li>
                </ol>
            </div>
        </div>
    </div>


    <x-modal.card max-width="6xl" title="" blur wire:model.defer="cardModal">
        <div x-show="isFiles">
            @include("livewire.user.update-files-modal")
        </div>
        <div x-show="!isFiles">
            @if(isset($user_data) && count($user_data))
                @include("livewire.user.update-registration-modal")
            @else
                @include("livewire.user.registration-modal")
            @endif
        </div>
    </x-modal.card>

    <!-- Results Modal -->
    <!-- Failed -->
    <div id="failed_modal" wire:ignore.self data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-3xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-darker-blue rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start absolute top-0 right-0 justify-between p-4 rounded-t">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="failed_modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <span class="p-4 font-quicksand font-semibold absolute top-0 left-0 text-xs text-white w-fit">Proficiency Diagnostic Exam Result (March 2023)</span>
                <!-- Modal body -->
                <div class="p-6 px-14 pb-24 space-y-6 w-full flex flex-col items-center justify-center pt-24 text-white">


                    {{-- Failed template --}}

                    {{-- START --}}

                    @if (isset($history_data))
                        @if ($history_data->exam_result === 'failed')
                            <div class="flex gap-5 items-center">
                                <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M28 55C42.9117 55 55 42.9117 55 28C55 13.0883 42.9117 1 28 1C13.0883 1 1 13.0883 1 28C1 42.9117 13.0883 55 28 55Z" stroke="#FB2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M36.0999 19.9L19.8999 36.1" stroke="#FB2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.8999 19.9L36.0999 36.1" stroke="#FB2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <div>
                                    <h1 class="text-5xl font-quicksand text-white font-semibold">Failed</h1>
                                </div>
                            </div>
                            <div>
                                <p class="text-center">
                                    We regret to inform you that based on the result of the Diagnostic Examination conducted last <span>{{ date('F j, Y', strtotime($history_data->schedule)) }}</span>, you are not qualified to take the ICT Proficiency Certification Examination.
                                </p>
                            </div>
                            <table>
                                <tr>
                                    <td><span>Part 1 (Multiple Choice)</span></td>
                                    <td><span class="px-5">:</span></td>
                                    <td><span class="text-[#FFD500] font-semibold">{{ $history_data->failedHistory->part_1 }}</span></td>
                                </tr>
                                <tr>
                                    <td><span>Part 2 (Program Simulation)</span></td>
                                    <td><span class="px-5">:</span></td>
                                    <td><span class="text-[#FFD500] font-semibold">{{ $history_data->failedHistory->part_2 }}</span></td>
                                </tr>
                                <tr>
                                    <td><span>Part 3 (Mini Programming)</span></td>
                                    <td><span class="px-5">:</span></td>
                                    <td><span class="text-[#FFD500] font-semibold">{{ $history_data->failedHistory->part_3 }}</span></td>
                                </tr>
                            </table>
                        @else
                            {{-- Passed template --}}

                            {{-- START --}}

                            <div class="flex gap-5 items-center">
                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M53 24.6229V27.0149C52.9968 32.6216 51.1813 38.077 47.8243 42.5676C44.4672 47.0582 39.7485 50.3433 34.3719 51.933C28.9953 53.5227 23.2489 53.3318 17.9896 51.3888C12.7304 49.4458 8.2401 45.8547 5.1885 41.1512C2.13689 36.4478 0.687457 30.8838 1.05636 25.2893C1.42526 19.6947 3.59274 14.3693 7.23553 10.1073C10.8783 5.84521 15.8012 2.87488 21.2701 1.63926C26.7389 0.403647 32.4607 0.968958 37.582 3.25088" stroke="#44D600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M53 6L26.8462 32L19 24.2078" stroke="#44D600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <div>
                                    <h1 class="text-5xl font-quicksand text-white font-semibold">Passed</h1>
                                </div>
                            </div>
                            <div>
                                <p class="text-center font-quicksand font-medium">
                                    Congratulations! You are qualified to receive ICT Proficiency Certification Examination.
                                </p>
                            </div>

                            {{-- END --}}
                        @endif
                    @endif

                    {{-- END --}}


                    {{-- Processing template --}}

                    {{-- START --}}
                    {{-- @dd(isset($user_data[0]->regDetails) && $user_data[0]->regDetails->status == 6 && count($user_data[0]->userHistory) > 0) --}}
                    @if(isset($user_data[0]->regDetails) && $user_data[0]->regDetails->status == 6 && count($user_data[0]->userHistory) == 0)
                        <div class="flex gap-5 items-center">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27 1V11.4" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27 42.6V53" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.61792 8.61816L15.9759 15.9762" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M38.0239 38.0239L45.3819 45.3819" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 27H11.4" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M42.6001 27H53.0001" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.61792 45.3819L15.9759 38.0239" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M38.0239 15.9762L45.3819 8.61816" stroke="#FFD500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <div>
                                <h1 class="text-5xl font-quicksand text-white font-semibold">Processing</h1>
                            </div>
                        </div>
                        <div>
                            <p class="text-center font-quicksand font-medium">
                                Results are still in the process of evaluation. For more information you can contact the DICT R5 Camarines Sur thru
                            </p>
                        </div>
                        <div class="flex flex-col items-center font-quicksand font-medium">
                            <p>ralph.talagtag@dict.gov.ph</p>
                            <p>09XXXXXXXXX</p>
                        </div>
                    @endif

                    {{-- END --}}






                    {{-- Approved template --}}

                    {{-- START --}}
                    {{-- <div class="flex gap-5 items-center">
                        <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M53 24.6229V27.0149C52.9968 32.6216 51.1813 38.077 47.8243 42.5676C44.4672 47.0582 39.7485 50.3433 34.3719 51.933C28.9953 53.5227 23.2489 53.3318 17.9896 51.3888C12.7304 49.4458 8.2401 45.8547 5.1885 41.1512C2.13689 36.4478 0.687457 30.8838 1.05636 25.2893C1.42526 19.6947 3.59274 14.3693 7.23553 10.1073C10.8783 5.84521 15.8012 2.87488 21.2701 1.63926C26.7389 0.403647 32.4607 0.968958 37.582 3.25088" stroke="#44D600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M53 6L26.8462 32L19 24.2078" stroke="#44D600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <div>
                            <h1 class="text-5xl font-quicksand text-white font-semibold">Approved</h1>
                        </div>
                    </div>
                    <div class="pt-5">
                        <p class="text-center font-quicksand font-medium">
                            Application has been approved! You are scheduled to take the diagnostic exam on May 1, 2023 12:00 am at Naga City Coloseum. Be there before the given time.
                        </p>
                    </div>
                </div> --}}

                {{-- END --}}

                {{-- <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M53 24.6229V27.0149C52.9968 32.6216 51.1813 38.077 47.8243 42.5676C44.4672 47.0582 39.7485 50.3433 34.3719 51.933C28.9953 53.5227 23.2489 53.3318 17.9896 51.3888C12.7304 49.4458 8.2401 45.8547 5.1885 41.1512C2.13689 36.4478 0.687457 30.8838 1.05636 25.2893C1.42526 19.6947 3.59274 14.3693 7.23553 10.1073C10.8783 5.84521 15.8012 2.87488 21.2701 1.63926C26.7389 0.403647 32.4607 0.968958 37.582 3.25088" stroke="#44D600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M53 6L26.8462 32L19 24.2078" stroke="#44D600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> --}}
            </div>
        </div>
    </div>


    <script>
        const addButton = document.querySelector('#add-trainings')
        const removeButton = document.querySelector('#remove-trainings')
        const itemContainer = document.querySelector('#seminars-attended-new')
        const saveSign = document.querySelector('#save-btn')
        const signInput = document.querySelector('#signature')
        const clearSign = document.querySelector('#clear-btn')
        const canvas = document.querySelector('#signature-pad');

        const messageAlert = document.querySelector('#message-alert');
        const dismissAlert = document.querySelector('#dismiss-alert');
        const closeAlertBtn = document.querySelector('#closeAlertBtn');
        const headings = document.querySelectorAll("h3");

        let targetHeading;
        for (let i = 0; i < headings.length; i++) {
            console.log(headings)
            if (headings[i]?.nextElementSibling?.tagName === "BUTTON") {
                targetHeading = headings[i];
                break;
            }
        }

        closeAlertBtn.addEventListener('click', _ => {
            dismissAlert.classList.toggle("hidden")
            location.reload()
        })

        let isInitialSign = true;

        canvas.addEventListener('mousedown', () => {
            if (!isInitialSign) return
            canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
            isInitialSign = false;
        })

        const signaturePad = new SignaturePad(canvas);

        clearSign.addEventListener("click", () => signaturePad.clear())
        @if(isset($user_data) && count($user_data))
            const image = new Image();
            image.src = "{{ $user_data[0]->e_sign }}";
            image.onload = function() {
                canvas.getContext("2d").drawImage(image, 0, 0, canvas.width, canvas.height);
            };
        @endif
        saveSign.addEventListener("click", async () => {
            const dataURL = signaturePad.toDataURL();
            signInput.value = dataURL;
            console.log(signInput.value)
            signInput.dispatchEvent(new Event('input'));
        })

        window.addEventListener('RegValidationSuccess', async _ => {
            dismissAlert.classList.remove('hidden')
            messageAlert.textContent = "Successfully Registered"
            targetHeading.nextElementSibling.click()

            setTimeout(() =>{
                dismissAlert.classList.remove('hidden')
                location.reload()
            }, 2000)
        })

        window.addEventListener('RegValidationErrors', async (err) => {
            let hasSectionOneError = err.hasOwnProperty('givenName')
                        || err.hasOwnProperty('middleName')
                        || err.hasOwnProperty('surName')
                        || err.hasOwnProperty('tel')
                        || err.hasOwnProperty('province')
                        || err.hasOwnProperty('municipality')
                        || err.hasOwnProperty('barangay')
                        || err.hasOwnProperty('surName')
                        || err.hasOwnProperty('email')
                        || err.hasOwnProperty('pob')
                        || err.hasOwnProperty('dob')
                        || err.hasOwnProperty('gender')
                        || err.hasOwnProperty('citizenship')
                        || err.hasOwnProperty('civilStatus');

            let hasSectionTwoError = err.hasOwnProperty('thumbnail')
                || err.hasOwnProperty('status')
                || err.hasOwnProperty('images');

            let hasSectionThreeError = err.hasOwnProperty('presentOffice')
                || err.hasOwnProperty('telNum')
                || err.hasOwnProperty('officeAddress')
                || err.hasOwnProperty('officeCategory')
                || err.hasOwnProperty('designationPosition')
                || err.hasOwnProperty('yearsPresentPosition')
                || err.hasOwnProperty('pl');

            let hasSectionFourError = err.hasOwnProperty('signature')

            if(hasSectionOneError) {
                $data.state = 1;
            } else if(hasSectionTwoError) {
                $data.state = 2;
            } else if (hasSectionThreeError) {
                $data.state = 3;
            } else if (hasSectionFourError) {
                $data.state = 4;
            }
        })

        window.addEventListener('RegUpdateValidationSuccess', async _ => {
            dismissAlert.classList.remove('hidden')
            messageAlert.textContent = "Successfully Updated Registration Form"
            targetHeading.nextElementSibling.click()
            console.log(1)

            setTimeout(() =>{
                dismissAlert.classList.remove('hidden')
                location.reload()
            }, 2000)
        })

        window.addEventListener('FileUpdateSuccess', async _ => {
            dismissAlert.classList.remove('hidden')
            messageAlert.textContent = "Successfully Uploaded Files"
            targetHeading.nextElementSibling.click()
            console.log(1)

            setTimeout(() =>{
                dismissAlert.classList.remove('hidden')
                location.reload()
            }, 2000)
        })
    </script>

    @vite(['resources/js/user/dashboard.js', 'resources/js/user/seminarsHandler.js'])
</div>
