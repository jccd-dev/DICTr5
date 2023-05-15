<div class="container relative mx-auto px-4 py-10 flex flex-col lg:flex-row gap-7" x-data="{ state: 1, hasVidData: false, err: [], currentStatus: '{{ $currentStatus ?: 'professional' }}', isFiles: false }">

{{--  main  --}}
    <div id="dismiss-alert" wire:ignore class="w-full hidden text-white bg-emerald-500 absolute -top-10 right-0 z-10">
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
                @else
                    <button type="button" id="register-form-btn"  class="py-4 px-5 bg-custom-red font-semibold" @click="$openModal('cardModal'); isFiles = false">
                            Register Exam
                    </button>
                @endif
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
