<div x-data="{ state: 1, hasVidData: false, err: [] }">

    <button type="button" @click="$openModal('cardModal')">open</button>

    <x-modal.card max-width="6xl" title="" blur wire:model.defer="cardModal">
        <div class="flex flex-col items-center gap-5">
            <div class="flex flex-col items-center">
                <h1 class="font-bold font-quicksand text-xl">ICT Proficiency Diagnostic Exam</h1>
                <h1 class="font-bold font-quicksand text-xl">Registration Form</h1>
            </div>
            <div class="w-full bg-dark-yellow font-bold font-quicksand text-center py-2">ADMISSION IS FREE</div>
            <div class="w-full bg-custom-red font-bold font-quicksand text-center text-white py-2">OPEN FOR RESIDENTS AND WORKERS OF CAMARINES SUR ONLY</div>
        </div>
        <div x-data="" class="px-6 py-6 lg:px-8 w-full">
            <div
                id="posts-form"
                class="flex w-full posts-form"
            >
                <form action="#" method="POST" class="w-full flex flex-col">
                    <div x-show="state == 1" class="w-full flex flex-col items-center">
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Personal Information</h1>
                        <div class="flex md:flex-row flex-col w-full gap-3">

                            <div class="flex md:flex-row flex-col flex-1 gap-3">
                                <x-forms.input-form name="Given Name" type="text" placeholder="Given Name" model="testing" id="given-name" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                <x-forms.input-form name="Middle Name" type="text" placeholder="Middle Name" model="" id="middle-name" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            </div>

                            <div class="flex md:flex-row flex-col flex-1 gap-3">
                                <x-forms.input-form name="Surname" type="text" placeholder="Surname" model="" id="surname" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                <x-forms.input-form name="Telephone Number" type="text" placeholder="Telephone Number" model="" id="tel-num" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            </div>
                        </div>

                        <div class="flex md:flex-row flex-col w-full gap-3">
                            <div class="flex md:flex-row flex-col flex-1 gap-3">
                                <x-forms.select name="Region" model="" id="region" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                <x-forms.select name="Province" model="" id="province" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            </div>

                            <div class="flex md:flex-row flex-col flex-1 gap-3">
                                <x-forms.select name="Municipality" model="" id="municipality" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                <x-forms.select name="Barangay" model="" id="barangay" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            </div>
                        </div>

                        <div class="flex md:flex-row flex-col w-full gap-3">
                            <x-forms.input-form name="Email" type="email" placeholder="Email" model="" id="email" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            <x-forms.input-form name="Place of Birth" type="text" placeholder="Place of Birth" model="" id="dob" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            <x-forms.datepicker name="Birth Date" placeholder="Birth Date" model="" id="datepicker" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>

                        <div class="flex md:flex-row flex-col w-full md:w-3/5 gap-3">
                            <x-forms.select name="Gender" model="" id="gender" :options="['male' => 'Male', 'female' => 'Female']" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            <x-forms.input-form name="Citizenship" type="text" placeholder="Citizenship" model="" id="citizenship" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            <x-forms.select name="Civil Status" model="" id="civil status" :options="['single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', 'widowed' => 'Widowed']" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                    </div>
                    <div x-show="state == 2" class="pb-3">
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Collegiate / Tertiary Education (attach certified true copy of transcript of record)</h1>
                        <div class="flex md:flex-row flex-col w-full gap-3">
                            <div class="flex flex-1">
                                <x-forms.input-form name="University / School Attended" type="text" placeholder="University / School Attended" model="" id="school-attended" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            </div>
                            <div class="flex flex-1 gap-3">
                                <x-forms.input-form name="Degree earned" type="text" placeholder="Degree earned" model="" id="degree-earned" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                <x-forms.input-form name="Inclusive years" type="number" placeholder="Inclusive Years" model="" id="inclusive-years" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            </div>
                        </div>
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">IT Trainings / Seminars (Related to chosen examination)</h1>
                        <div class="flex flex-col w-full gap-1">
                            <div id="seminars-container" class="flex flex-col gap-2 w-full">
                                <div class="flex md:flex-row flex-col w-full gap-3 relative">
                                    <div class="flex flex-1">
                                        <x-forms.input-form name="Course / Seminar Title" type="text" placeholder="Course / Seminar Title" model="" id="seminar" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                    </div>
                                    <div class="flex flex-1">
                                        <x-forms.input-form name="Training Center" type="text" placeholder="Training Center" model="" id="training-center" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                    </div>
                                    <div class="flex flex-1 gap-3">
                                        <x-forms.input-form name="Total Training Hours" type="number" placeholder="Total Training Hours" model="" id="training-hours" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                        <x-forms.file name="Upload Certificate" placeholder="Upload Certificate" model="certificate" id="certificate" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end gap-3">
                                <button type="button" id="remove-trainings" class="flex items-center gap-2 rounded-md text-red-700 -top-1/4 right-0 px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    Remove
                                </button>
                                <button type="button" id="add-trainings" class="flex items-center gap-2 bg-green-500 rounded-md text-white -top-1/4 right-0 px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div x-show="state == 3">


                    </div>

                    <div class="flex justify-end w-full pt-5 border-t">
                        <div class="w-[20rem] flex gap-5">
                            <button :class="state == 1 ? 'cursor-not-allowed' : ''" :disabled="state == 1" @click="state--" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 flex-1">
                                Back
                            </button>
                            <button x-show="state != 3" type="button" @click="state++;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1">
                                Next
                            </button>

                            <button x-show="state == 3" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </x-modal.card>

    <script>
        const addButton = document.querySelector('#add-trainings')
        const removeButton = document.querySelector('#remove-trainings')
        const itemContainer = document.querySelector('#seminars-container')

        addButton.addEventListener('click', (e) => {
            appendSeminarsAttended()
        })

        let i = 1;
        function appendSeminarsAttended() {
            const seminarCode = '' +
                '<div class="flex md:flex-row flex-col w-full gap-3 relative">' +
                '<div class="flex flex-1">' +
                '<div class="mb-3 md:mb-6 flex-1 flex-col">' +
                '    <label for="seminar" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Course / Seminar Title</label>' +
                '        <input' +
                '            type="text"' +
                '            id="seminar"' +
                '            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"' +
                '            placeholder="Course / Seminar Title"' +
                '            wire:model.lazy=""' +
                '            value=""' +
                '        >' +
                '</div>' +
                '</div>' +
                '<div class="flex flex-1">' +
                '<div class="mb-3 md:mb-6 flex-1 flex-col">' +
                '    <label for="training-center" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Training Center</label>' +
                '        <input' +
                '            type="text"' +
                '            id="training-center"' +
                '            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"' +
                '            placeholder="Training Center"' +
                '            wire:model.lazy=""' +
                '            value=""' +
                '        >' +
                '</div>' +
                '</div>' +
                '<div class="flex flex-1 gap-3">' +
                '<div class="mb-3 md:mb-6 flex-1 flex-col">' +
                '    <label for="training-hours" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Total Training Hours</label>' +
                '        <input' +
                '            type="number"' +
                '            id="training-hours"' +
                '            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"' +
                '            placeholder="Total Training Hours"' +
                '            wire:model.lazy=""' +
                '            value=""' +
                '        >' +
                '</div>' +
                '<x-forms.input-form name="Inclusive years" type="number" placeholder="Inclusive Years" model="" id="inclusive-years" classes="mb-3 md:mb-6 flex-1 flex-col" />' +
                '</div>' +
                '</div>';

            itemContainer.innerHTML += seminarCode;
        }



    </script>
    @vite(['resources/js/user/dashboard.js', 'resources/js/user/seminarsHandler.js'])
</div>
