<div id="hs-vertically-centered-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-[60rem] sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
      <div class="flex flex-col bg-white w-fit border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
          <h3 class="font-bold text-gray-800 dark:text-white">
          </h3>
          <button type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-vertically-centered-modal">
            <span class="sr-only">Close</span>
            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
            </svg>
          </button>
        </div>
        <div class="p-4 overflow-y-auto w-[60rem]" x-data="{ state: 1, hasVidData: false, err: [], currentStatus: '{{ $examinees_data->current_status }}', isFiles: false }" x-init="listeners($data)">
            <div class="flex flex-col items-center gap-5">
                <div class="flex flex-col items-center">
                    <h1 class="font-bold font-quicksand text-xl">ICT Proficiency Diagnostic Exam</h1>
                    <h1 class="font-bold font-quicksand text-xl">Registration Form</h1>
                </div>
                <div class="w-full bg-dark-yellow font-bold font-quicksand text-center py-2">ADMISSION IS FREE</div>
                <div class="w-full bg-custom-red font-bold font-quicksand text-center text-white py-2">OPEN FOR RESIDENTS AND WORKERS OF CAMARINES SUR ONLY</div>
            </div>
            <div class="px-6 py-6 lg:px-8 w-full">
                <div
                    id="posts-form"
                    class="flex w-full posts-form"
                >
                    <form id="add-applicant" class="w-full flex flex-col">
                        @csrf
                        <div x-show="state == 1" class="w-full flex flex-col items-center">
                            <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Personal Information</h1>
                            <div class="flex justify-start w-full">
                                <div class="">
                                    <div class="mb-4">
                                        <input id="default-checkbox" name="retake" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Exam Retaker</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex md:flex-row flex-col w-full gap-3">
                                <div class="flex md:flex-row flex-col flex-1 gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="givenName" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Given Name</label>
                                            <input
                                                type="text"
                                                id="givenName"
                                                name="givenName"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Given Name"
                                                value="{{ $examinees_data->fname }}"
                                            >
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="middleName" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Middle Name</label>
                                            <input
                                                type="text"
                                                id="middleName"
                                                name="middleName"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Middle Name"
                                                value="{{ $examinees_data->mname }}"
                                            >
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>

                                <div class="flex md:flex-row flex-col flex-1 gap-3" x-data="{ number: '{{ $examinees_data->contact_number }}' }">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="surName" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Surname</label>
                                            <input
                                                type="text"
                                                id="surName"
                                                name="surName"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Surname"
                                                value="{{ $examinees_data->lname }}"
                                            >
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="Telephone Number" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Telephone Number</label>
                                        <input
                                            type="text"
                                            id="tel"
                                            name="tel"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Telephone Number"
                                            x-model="number"
                                            x-on:input="number = number.replace(/[^0-9]/g, '')"
                                            value="{{ $examinees_data->contact_number }}"
                                        >
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col w-full gap-3">
                                <div class="flex md:flex-row flex-col flex-1 gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="region" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                                        <select id="region" data-value="{{ isset($examinees_data->addresses->region) ? $examinees_data->addresses->region : '' }}" name="region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">Choose a category</option>
                                        </select>
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="province" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                                        <select id="province" data-value="{{ isset($examinees_data->addresses->province) ? $examinees_data->addresses->province : '' }}" name="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">Choose a category</option>
                                        </select>
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>

                                <div class="flex md:flex-row flex-col flex-1 gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="municipality" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Municipality</label>
                                        <select id="municipality" data-value="{{ isset($examinees_data->addresses->municipality) ? $examinees_data->addresses->municipality : '' }}" name="municipality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">Choose a category</option>
                                        </select>
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="barangay" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                                        <select id="barangay" data-value="{{ isset($examinees_data->addresses->barangay) ? $examinees_data->addresses->barangay : '' }}" name="barangay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">Choose a category</option>
                                        </select>
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex md:flex-row flex-col w-full gap-3">
                                <div class="mb-3 md:mb-6 flex-1 flex-col">
                                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Email</label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Email"
                                        value="{{ !isset($examinees_data->email) ? "" : $examinees_data->email }}"
                                    >
                                    <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                </div>
                                <div class="mb-3 md:mb-6 flex-1 flex-col">
                                    <label for="pob" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Place of Birth</label>
                                        <input
                                            type="text"
                                            id="pob"
                                            name="pob"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Place of Birth"
                                            value="{{ $examinees_data->place_of_birth }}"
                                        >
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                </div>

                                <div class="mb-3 md:mb-6 flex-1 flex-col">
                                    <label for="dob" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Date of Birth</label>
                                    <div class="relative max-w-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input
                                            id="dob"
                                            datepicker
                                            datepicker-autohide
                                            type="text"
                                            name="dob"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date"
                                            value="{{ $examinees_data->date_of_birth }}"
                                            >
                                        </div>
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                </div>

                            </div>

                            <div class="flex md:flex-row flex-col w-full md:w-3/5 gap-3">
                                <div class="mb-3 md:mb-6 flex-1 flex-col">
                                    <label for="gender" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Choose a category</option>
                                        <option {{ $examinees_data->gender == "male" ? "selected" : "" }} value="male">Male</option>
                                        <option {{ $examinees_data->gender == "female" ? "selected" : "" }} value="female">Female</option>
                                    </select>
                                    <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                </div>
                                <div class="mb-3 md:mb-6 flex-1 flex-col">
                                    <label for="citizenship" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Citizenship</label>
                                        <input
                                            type="text"
                                            id="citizenship"
                                            name="citizenship"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Citizenship"
                                            value="{{ $examinees_data->citizenship }}"
                                        >
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                </div>
                                <div class="mb-3 md:mb-6 flex-1 flex-col">
                                    <label for="civil-status" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Civil Status</label>
                                    <select id="civil-status" name="civilStatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Choose a category</option>
                                        @foreach (['single', 'married', 'divorced', 'widowed'] as $item)
                                            <option {{ $examinees_data->civil_status == $item ? 'selected="selected"' : '' }} value="{{ $item }}">{{ Str::ucfirst($item) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                </div>
                            </div>
                        </div>
                        <div x-show="state == 2" class="pb-3">
                            <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Collegiate / Tertiary Education (attach certified true copy of transcript of record)</h1>
                            <div class="flex md:flex-row flex-col w-full gap-3">
                                <div class="flex flex-1">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="university" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">University / School Attended</label>
                                            <input
                                                type="text"
                                                id="university"
                                                name="university"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="University / School Attended"
                                                value="{{ $examinees_data->tertiaryEdu->school_attended }}"
                                            >
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                                <div class="flex flex-1 gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="degree" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Degree Earned</label>
                                            <input
                                                type="text"
                                                id="degree"
                                                name="degree"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Degree Earned"
                                                value="{{ $examinees_data->tertiaryEdu->degree }}"
                                            >
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label for="incYears" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Inclusive Years</label>
                                            <input
                                                type="text"
                                                id="incYears"
                                                name="incYears"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Inclusive Years"
                                                value="{{ $examinees_data->tertiaryEdu->inclusive_years }}"
                                            >
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                            </div>
                            <h1 class="font-bold font-quicksand text-xl flex self-start my-4">IT Trainings / Seminars (Related to chosen examination)</h1>
                            <div class="flex flex-col w-full gap-1">
                                <div id="seminars-container" class="flex flex-col gap-2 w-full">
                                    <div id="seminars-attended-new" class="flex flex-col gap-2 w-full">
                                        {{-- loop start here --}}

                                        {{-- loop end here --}}
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
                            <div class="flex flex-col mt-1">
                                <h1 class="block mb-3 text-lg font-medium text-gray-900 dark:text-white">Current Status</h1>
                                <div class="flex">
                                    <div class="flex items-center mr-4">
                                        <input @change="currentStatus = 'student'" {{ $examinees_data->current_status != "student" ? '' : 'checked' }} id="student" type="radio" value="student" name="current-status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="student" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input {{ $examinees_data->current_status != 'professional' ? '' : 'checked' }} @change="currentStatus = 'professional'" id="professional" type="radio" value="professional" name="current-status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="professional" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Professional</label>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <hr />
                            <div x-show="currentStatus == 'student'">
                                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">School Year Information</h1>
                                <div class="flex md:flex-row flex-col w-full gap-3">
                                    <div class="flex md:flex-row flex-col gap-3">
                                        <div class="mb-3 md:mb-6 flex-1 flex-col">
                                            <label for="yearLevel" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Year Level</label>
                                            <select id="yearLevel" name="yearLevel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Choose a year level</option>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    <option {{ $examinees_data->year_level == $i ? "selected" : "" }} value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div x-show="currentStatus == 'professional'">
                                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Employment Information</h1>
                                <div class="flex md:flex-row flex-col w-full gap-3">
                                    <div class="flex md:flex-row flex-col basis-3/4 gap-3">
                                        <div class="mb-3 md:mb-6 flex-1 flex-col">
                                            <label for="presentOffice" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Present Office</label>
                                                <input
                                                    type="text"
                                                    id="presentOffice"
                                                    name="presentOffice"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Present Office"
                                                    value="{{ $examinees_data->present_office }}"
                                                >
                                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                        </div>
                                    </div>
                                    <div class="flex md:flex-row flex-col basis-1/4 gap-3">
                                        <div class="mb-3 md:mb-6 flex-1 flex-col">
                                            <label for="telNum" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Telephone Number</label>
                                                <input
                                                    type="number"
                                                    id="telNum"
                                                    name="telNum"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Telephone Number"
                                                    value="{{ $examinees_data->telephone_number }}"
                                                >
                                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex md:flex-row flex-col w-full gap-3">
                                    <div class="flex md:flex-row flex-col basis-3/4 gap-3">
                                        <div class="mb-3 md:mb-6 flex-1 flex-col">
                                            <label for="officeAddress" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Office Address</label>
                                                <input
                                                    type="text"
                                                    id="officeAddress"
                                                    name="officeAddress"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Office Address"
                                                    value="{{ $examinees_data->office_address }}"
                                                >
                                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col basis-1/4 gap-3">
                                        <h1 class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Office Category</h1>
                                        <div class="flex">
                                            <div class="flex items-center mr-4">
                                                <input id="government" {{ $examinees_data->office_category != 'government' ? "" : 'checked' }} type="radio" value="government" name="officeCategory" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="government" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gov't</label>
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input id="private" {{ $examinees_data->office_category != 'private' ? "" : 'checked' }} type="radio" value="private" name="officeCategory" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="private" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Private</label>
                                            </div>
                                        </div>
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                                <div class="flex md:flex-row flex-col w-full gap-3">
                                    <div class="flex md:flex-row flex-col basis-3/4 gap-3">
                                        <div class="mb-3 md:mb-6 flex-1 flex-col">
                                            <label for="designationPosition" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Designation / Position</label>
                                                <input
                                                    type="text"
                                                    id="designationPosition"
                                                    name="designationPosition"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Designation / Position"
                                                    value="{{ $examinees_data->designation }}"
                                                >
                                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                        </div>
                                    </div>
                                    <div class="flex md:flex-row flex-col basis-1/4 gap-3">
                                        <div class="mb-3 md:mb-6 flex-1 flex-col">
                                            <label for="yearsPresentPosition" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">No. of years in present position</label>
                                                <input
                                                    type="number"
                                                    id="yearsPresentPosition"
                                                    name="yearsPresentPosition"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="No. of years in present position"
                                                    value="{{ $examinees_data->no_of_years_in_pos }}"
                                                >
                                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-3/4 lg:w-1/2">
                                <h1 class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">For Programming: <b>Check the language that you will use in the exam</b></h1>
                                <div class="flex mb-3">
                                    <div class="flex flex-1 items-center mr-4">
                                        <input {{ $examinees_data->programming_langs != 'Visual Basic 6.0' ? "" : 'checked' }} id="visual-basic" type="radio" value="Visual Basic 6.0" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="visual-basic" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Visual Basic 6.0</label>
                                    </div>
                                    <div class="flex flex-1 items-center mr-4">
                                        <input {{ $examinees_data->programming_langs != 'C++' ? "" : 'checked' }} id="cpp" type="radio" value="C++" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="cpp" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C++</label>
                                    </div>
                                    <div class="flex flex-1 items-center mr-4">
                                        <input {{ $examinees_data->programming_langs != 'C Language' ? "" : 'checked' }} id="c-language" type="radio" value="C Language" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="c-language" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C Language</label>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex flex-1 items-center mr-4">
                                        <input {{ $examinees_data->programming_langs != 'VB.NET' ? "" : 'checked' }} id="vb-net" type="radio" value="VB.NET" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="vb-net" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">VB.NET</label>
                                    </div>
                                    <div class="flex flex-1 items-center mr-4">
                                        <input {{ $examinees_data->programming_langs != 'C#' ? "" : 'checked' }} id="c-sharp" type="radio" value="C#" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="c-sharp" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C#</label>
                                    </div>
                                    <div class="flex flex-1 items-center mr-4">
                                        <input {{ $examinees_data->programming_langs != 'Java' ? "" : 'checked' }} id="java" type="radio" value="Java" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="java" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Java</label>
                                    </div>
                                </div>
                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                            </div>
                            <br />
                            <hr />
                        </div>
                        <div x-show="state == 4">
                            <div x-show="currentStatus == 'student'">
                                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                                <div class="w-full md:w-4/5 flex gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="passport">Upload Passport Size Image (required for students)</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="passport"
                                            type="file"
                                            name="passport"
                                            accept=".pdf,.doc,.docx,image/*"
                                        />
                                        @php
                                            foreach ($examinees_data->submittedFiles as $key => $value) {
                                                if ($value->requirement_type == "passport") {
                                                    echo '<p class="passport-err text-sm">Current upload: <span>'.$value->file_name.'</span></p>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="psa">PSA Birth Certificate (required for students)</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="psa"
                                            type="file"
                                            name="psa"
                                            accept=".pdf,.doc,.docx,image/*"
                                        />
                                        @php
                                            foreach ($examinees_data->submittedFiles as $key => $value) {
                                                if ($value->requirement_type == "psa") {
                                                    echo '<p class="psa-err text-sm">Current upload: <span>'.$value->file_name.'</span></p>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                                <div class="w-full md:w-2/5 flex gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="cert">COE / COG (required for students)</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="cert"
                                            type="file"
                                            name="cert"
                                            accept=".pdf,.doc,.docx,image/*"
                                        />
                                        @php
                                            foreach ($examinees_data->submittedFiles as $key => $value) {
                                                if ($value->requirement_type == "coe") {
                                                    echo '<p class="certs-err text-sm">Current upload: <span>'.$value->file_name.'</span></p>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                            </div>
                            <div x-show="currentStatus == 'professional'">
                                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                                <div class="w-full md:w-4/5 flex gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="valid-id">Valid ID (required for professional)</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="valid-id"
                                            type="file"
                                            name="validId"
                                            accept=".pdf,.doc,.docx,image/*"
                                        />
                                        @php
                                            foreach ($examinees_data->submittedFiles as $key => $value) {
                                                if ($value->requirement_type == "validId") {
                                                    echo '<p class="valid-err text-sm">Current upload: <span>'.$value->file_name.'</span></p>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="diploma">Diploma / TOR (required for prefessional)</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="diploma"
                                            type="file"
                                            name="diploma"
                                            accept=".pdf,.doc,.docx,image/*"
                                        />
                                        @php
                                            foreach ($examinees_data->submittedFiles as $key => $value) {
                                                if ($value->requirement_type == "diploma_TOR") {
                                                    echo '<p class="diploma-err text-sm">Current upload: <span>'.$value->file_name.'</span></p>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                                <div class="w-full md:w-4/5 flex gap-3">
                                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                                        <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="passport">Upload Passport Size Image (required for students)</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="passport"
                                            type="file"
                                            name="passport"
                                            accept=".pdf,.doc,.docx,image/*"
                                        />
                                        @php
                                            foreach ($examinees_data->submittedFiles as $key => $value) {
                                                if ($value->requirement_type == "passport") {
                                                    echo '<p class="passport-err text-sm">Current upload: <span>'.$value->file_name.'</span></p>';
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <hr />

                            @php
                                if(!empty($examinees_data->add_info)){
                                    foreach (json_decode($examinees_data->add_info) as $value) {
                                        if ($value === 'PWD') {
                                            $pwd = $value;
                                        } else if ($value === 'Senior Citizen') {
                                            $sc = $value;
                                        } else if ($value === 'Solo Parent') {
                                            $sp = $value;
                                        } else if ($value === 'Member of an IP Group') {
                                            $mipg = $value;
                                        }
                                    }
                                }
                            @endphp
                            <div class="w-full">
                                <h1 class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">ADDITIONAL INFO <b>(Please check that apply)</b></h1>
                               <div class="flex ">
                                    <div class="flex flex-1 mb-3">
                                        <div class="flex flex-1 items-center mr-4">
                                            <input id="pwd" type="checkbox" value="PWD" {{ isset($pwd) ? 'checked' : '' }} name="addInfo[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="pwd" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PWD</label>
                                        </div>
                                        <div class="flex flex-1 items-center mr-4">
                                            <input id="senior-citizen" type="checkbox" {{ isset($sc) ? 'checked' : '' }} value="Senior Citizen" name="addInfo[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="senior-citizen" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Senior Citizen</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-1">
                                        <div class="flex flex-1 items-center mr-4">
                                            <input id="solo-parent" type="checkbox" {{ isset($sp) ? 'checked' : '' }} value="Solo Parent" name="addInfo[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="solo-parent" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Solo Parent</label>
                                        </div>
                                        <div class="flex flex-1 items-center mr-4">
                                            <input id="ip-member" type="checkbox" {{ isset($mipg) ? 'checked' : '' }} value="Member of an IP Group" name="addInfo[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="ip-member" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member of an IP Group</label>
                                        </div>
                                    </div>
                               </div>
                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                            </div>

                            <div class="my-3">
                                <h1 class="font-bold font-quicksand text-base flex self-start my-1">IMPORTANT</h1>
                                <div class="flex items-center gap-3 mx-7">
                                    <div class="flex items-center h-5">
                                        <input id="helper-checkbox" required aria-describedby="helper-checkbox-text" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div class="ml-2 text-sm">
                                        <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">I hereby certify to the best of my knowledge and information, that these are true and correct. Any information found to be false is a ground for disqualification from taking the Proficiency Examination in the future.</label>
                                    </div>
                                </div>
                            </div>
                            <hr />

                            <div class="flex flex-col justify-center items-center my-5">
                                <div class="">
                                    <h1 class="font-bold font-quicksand text-lg flex self-start my-4">Signature</h1>
                                    <div class="w-fit rounded-xl border-2 border-custom-blue bg-custom-blue bg-opacity-5">
                                        <canvas id="signature-pad" width="400" height="200"></canvas>
                                        <input type="text" hidden name="signature" id="signature" value="{{ $examinees_data->e_sign }}" />
                                    </div>
                                    <div class="flex gap-3">
                                        <button type="button" id="clear-btn">Clear</button>
                                        <a href="#" @click.prevent id="save-btn" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Save</a>
                                    </div>
                                </div>
                                <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                            </div>

                        </div>
                        <div class="flex justify-between items-center w-full pt-5 border-t">
                            <div class="w-[20rem] flex gap-5">
                                <h3 class="font-semibold font-quicksand">Part <span x-text="state"></span> of 4</h3>
                            </div>
                            <div class="w-[20rem] flex gap-5">
                                <button :class="state == 1 ? 'cursor-not-allowed' : ''" :disabled="state == 1" @click="state--" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 flex-1">
                                    Back
                                </button>
                                <button x-show="state != 4" type="button" @click="state++;" class="text-white bg-dark-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-dark-blue dark:focus:ring-blue-800 flex-1">
                                    Next
                                </button>

                                <button x-show="state == 4" type="submit" class="text-white bg-dark-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-dark-blue dark:focus:ring-blue-800 flex-1">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
