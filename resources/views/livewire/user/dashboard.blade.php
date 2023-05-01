<div class="container mx-auto px-4 py-10 flex flex-col lg:flex-row gap-7" x-data="{ state: 1, hasVidData: false, err: [], currentStatus: 'professional' }">

{{--  main  --}}

    <div class="basis-3/4">
        <div class="flex flex-col lg:flex-row rounded-3xl bg-darker-blue text-white p-14 gap-14 lg:gap-7 justify-between pb-20 lg:pb-36">
            <div class="flex flex-col">
                <div class="flex gap-7">
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
                <button type="button" class="py-4 px-5 bg-custom-red font-semibold" @click="$openModal('cardModal')">Register Exam</button>
                <button type="button" class="py-4 px-5 bg-dark-yellow font-semibold text-black">Download Completed Examination Form</button>
            </div>
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
    </div>


    <x-modal.card max-width="6xl" title="" blur wire:model.defer="cardModal">
        @include("livewire.user.registration-modal")
    </x-modal.card>



    <script>
        const addButton = document.querySelector('#add-trainings')
        const removeButton = document.querySelector('#remove-trainings')
        const itemContainer = document.querySelector('#seminars-attended-new')
        const saveSign = document.querySelector('#save-btn')
        const signInput = document.querySelector('#signature')
        const clearSign = document.querySelector('#clear-btn')
        const canvas = document.querySelector('#signature-pad');

        const signaturePad = new SignaturePad(canvas);

        clearSign.addEventListener("click", () => signaturePad.clear())

        saveSign.addEventListener("click", async () => {
            const dataURL = signaturePad.toDataURL();
            signInput.value = dataURL;
            console.log(signInput.value)
            signInput.dispatchEvent(new Event('input'));
        })
    </script>

    @vite(['resources/js/user/dashboard.js', 'resources/js/user/seminarsHandler.js'])
</div>
