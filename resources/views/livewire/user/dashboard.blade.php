<div class="container relative mx-auto px-4 py-10 flex flex-col lg:flex-row gap-7" x-data="{ state: 1, hasVidData: false, err: [], currentStatus: '{{ $currentStatus ?: 'professional' }}', isFiles: false }">

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
    <div class="basis-3/4">
        <div class="flex flex-col lg:flex-row rounded-3xl bg-darker-blue text-white p-14 gap-14 lg:gap-7 justify-between pb-20 lg:pb-36">
            <div class="flex flex-col">
                <div class="flex gap-7 ">
                    <div>
                        <img src="{{ asset('img/Group 44.svg') }}" alt="">
                    </div>
                    <div class="font-quicksand flex flex-col">
                        <h1 class="font-bold text-3xl">Keanu Reeves</h1>
                        <a href="mailto:keanu.reeves@gmail.com" class="hover:underline">keanu.reeves@gmail.com</a>
                        <span>Professional</span>
                        <div class="flex gap-5 mt-10">
                            <div class="flex flex-col gap-2">
                                <span>Date of Birth:</span>
                                <span>Gender</span>
                                <span>Address</span>
                                <span>Telephone No.</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <span class="font-semibold">September 2, 1964</span>
                                <span class="font-semibold">Male</span>
                                <span class="font-semibold">San Miguel, Nabua, Camarines Sur</span>
                                <span class="font-semibold">09279386253</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col font-quicksand max-w-[15rem] gap-3">
                @if(isset($user_data) && count($user_data))
                    <button type="button" id="update-form-btn" class="py-4 px-5 bg-custom-red font-semibold" @click="$openModal('cardModal'); isFiles = false" wire:click="populate_user_data">
                            Update Exam Form
                    </button>
                    <button type="button" id="update-file-btn"  class="py-4 px-5 bg-custom-red font-semibold" @click="$openModal('cardModal'); isFiles = true" wire:click="populate_user_data">
                            Update Submitted Files
                    </button>
                    <button type="button" id="update-form-btn" class="py-4 px-5 bg-custom-red font-semibold" wire:click="apply({{ $user_data[0]->id }})" wire:ignore>
                        Apply
                    </button>
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            February 10, 2023
                        </th>
                        <td class="px-6 py-4">
                            9:00 AM - 12:00 PM
                        </td>
                        <td class="px-6 py-4">
                            Naga City Digital Innovation Hub
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            May 24, 2023
                        </th>
                        <td class="px-6 py-4">
                            9:00 AM - 12:00 PM
                        </td>
                        <td class="px-6 py-4">
                            Naga City Digital Innovation Hub
                        </td>
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
                            Approved Date
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
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            February 10, 2023
                        </th>
                        <td class="px-6 py-4">
                            03-10-2023
                        </td>
                        <td class="px-6 py-4">
                            05-24-2023
                        </td>
                        <td class="px-6 py-4">
                            Naga City Digital Innovation Hub
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-[#E35F00] text-white text-xs py-1 px-3 font-semibold rounded">Incomplete Req.</span>
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" data-modal-target="failed_modal" data-modal-toggle="failed_modal" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-3 py-1 text-center">View</button>
                        </td>
                    </tr>
                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            May 24, 2023
                        </th>
                        <td class="px-6 py-4">
                            03-10-2023
                        </td>
                        <td class="px-6 py-4">
                            05-24-2023
                        </td>
                        <td class="px-6 py-4">
                            Naga City Digital Innovation Hub
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-[#C1121F] text-white text-xs py-1 px-3 font-semibold rounded">Disapprove</span>
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-3 py-1 text-center">View</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <span class="bg-[#FFD500] text-black text-xs py-1 px-3 font-semibold rounded">For Evaluation</span> <br>
            <span class="bg-[#65E02B] text-black text-xs py-1 px-3 font-semibold rounded">Approved</span> <br>
            <span class="bg-[#00509D] text-white text-xs py-1 px-3 font-semibold rounded">Waiting for Result</span> <br>
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="flex flex-row px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                            </svg>
                            TOR_ Reeves.pdf
                        </th>
                        <td class="">
                            <button type="button" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</button>
                            <button type="button" class="px-3 py-1 text-xs font-medium text-center text-white bg-[#00509D] rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Replace</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="flex flex-row px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                            </svg>
                            Birth_Certificate.png
                        </th>
                        <td class="">
                            <button type="button" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</button>
                            <button type="button" class="px-3 py-1 text-xs font-medium text-center text-white bg-[#00509D] rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Replace</button>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="flex flex-row px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                            </svg>
                            PassportSizeImage.jpg
                        </th>
                        <td class="">
                            <button type="button" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</button>
                            <button type="button" class="px-3 py-1 text-xs font-medium text-center text-white bg-[#00509D] rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Replace</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <br>

            <div class="rounded-lg bg-[#D9D9D9] p-3 px-5">
                <h4 class="font-bold mb-3">How to register?</h4>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Lorem ipsum dolor sit amet.</li>
                    <li class="mb-1">Consectetur adipiscing elit.</li>
                    <li class="mb-1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li class="mb-1">Ut enim ad minim veniam, </li>
                </ol>

                <h4 class="font-bold mb-3">Requirements</h4>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Lorem ipsum dolor sit amet.</li>
                    <li class="mb-1">Consectetur adipiscing elit.</li>
                    <li class="mb-1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li class="mb-1">Ut enim ad minim veniam, </li>
                </ol>

                <h4 class="font-bold mb-3">Coverage of Exam</h4>
                <ol class="list-decimal list-inside ml-5 mb-3">
                    <li class="mb-1">Lorem ipsum dolor sit amet.</li>
                    <li class="mb-1">Consectetur adipiscing elit.</li>
                    <li class="mb-1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                    <li class="mb-1">Ut enim ad minim veniam, </li>
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
    <div id="failed_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Static modal
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="failed_modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
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
