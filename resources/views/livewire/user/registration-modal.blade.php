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
        <form action="#" method="POST" wire:submit.prevent="submit" class="w-full flex flex-col">
            <div x-show="state == 1" class="w-full flex flex-col items-center">
                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Personal Information</h1>
                <div class="flex md:flex-row flex-col w-full gap-3">
                    <div class="flex md:flex-row flex-col flex-1 gap-3">
                        <x-forms.input-form name="Given Name" type="text" placeholder="Given Name" model="givenName" id="given-name" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.input-form name="Middle Name" type="text" placeholder="Middle Name" model="middleName" id="middle-name" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>

                    <div class="flex md:flex-row flex-col flex-1 gap-3">
                        <x-forms.input-form name="Surname" type="text" placeholder="Surname" model="surName" id="surname" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.input-form name="Telephone Number" type="number" placeholder="Telephone Number" model="tel" id="tel-num" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                </div>

                <div class="flex md:flex-row flex-col w-full gap-3">
                    <div class="flex md:flex-row flex-col flex-1 gap-3" wire:ignore>
                        <x-forms.select name="Region" model="region" id="region" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.select name="Province" model="province" id="province" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>

                    <div class="flex md:flex-row flex-col flex-1 gap-3" wire:ignore>
                        <x-forms.select name="Municipality" model="municipality" id="municipality" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.select name="Barangay" model="barangay" id="barangay" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                </div>

                <div class="flex md:flex-row flex-col w-full gap-3">
                    <x-forms.input-form name="Email" type="email" placeholder="Email" model="email" id="email" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    <x-forms.input-form name="Place of Birth" type="text" placeholder="Place of Birth" model="pob" id="pob" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    <x-datetime-picker
                        label="Birth Date"
                        placeholder="Birth Date"
                        wire:model.defer="dob"
                        without-time="true"
                        without-tips="true"
                    />
                </div>

                <div class="flex md:flex-row flex-col w-full md:w-3/5 gap-3">
                    <x-forms.select name="Gender" model="gender" id="gender" :options="['male' => 'Male', 'female' => 'Female']" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    <x-forms.input-form name="Citizenship" type="text" placeholder="Citizenship" model="citizenship" id="citizenship" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    <x-forms.select name="Civil Status" model="civilStatus" id="civil status" :options="['single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', 'widowed' => 'Widowed']" classes="mb-3 md:mb-6 flex-1 flex-col" />
                </div>
            </div>
            <div x-show="state == 2" class="pb-3">
                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Collegiate / Tertiary Education (attach certified true copy of transcript of record)</h1>
                <div class="flex md:flex-row flex-col w-full gap-3">
                    <div class="flex flex-1">
                        <x-forms.input-form name="University / School Attended" type="text" placeholder="University / School Attended" model="university" id="school-attended" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                    <div class="flex flex-1 gap-3">
                        <x-forms.input-form name="Degree earned" type="text" placeholder="Degree earned" model="degree" id="degree-earned" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.input-form name="Inclusive years" type="number" placeholder="Inclusive Years" model="incYears" id="inclusive-years" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                </div>
                <h1 class="font-bold font-quicksand text-xl flex self-start my-4">IT Trainings / Seminars (Related to chosen examination)</h1>
                <div class="flex flex-col w-full gap-1">
                    <div id="seminars-container" class="flex flex-col gap-2 w-full">
                        {{--                                <div class="flex md:flex-row flex-col w-full gap-3 relative">--}}
                        {{--                                    <div class="flex flex-1">--}}
                        {{--                                        <x-forms.input-form name="Course / Seminar Title" type="text" placeholder="Course / Seminar Title" model="trainings.0.course" id="seminar" classes="mb-3 md:mb-6 flex-1 flex-col" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="flex flex-1">--}}
                        {{--                                        <x-forms.input-form name="Training Center" type="text" placeholder="Training Center" model="trainings.0.center" id="training-center" classes="mb-3 md:mb-6 flex-1 flex-col" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="flex flex-1 gap-3">--}}
                        {{--                                        <x-forms.input-form name="Total Training Hours" type="number" placeholder="Total Training Hours" model="trainings.0.hours" id="training-hours" classes="mb-3 md:mb-6 flex-1 flex-col" />--}}
                        {{--                                        <x-forms.file name="Upload Certificate" placeholder="Upload Certificate" model="trainings.0.certificates" id="certificate" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        <div id="seminars-attended-new" class="flex flex-col gap-2 w-full">
                            @foreach ($trainings as $i => $training)
                                {{--                                        @if($i == 0)--}}
                                {{--                                            @continue--}}
                                {{--                                        @endif--}}
                                <div class="flex md:flex-row flex-col w-full gap-3 relative" wire:key="trainings-{{ $i }}">
                                    <div class="flex flex-1" >
                                        <x-forms.input-form name="Course / Seminar Title" type="text" placeholder="Course / Seminar Title" model="trainings.{{ $i }}.course" id="seminar-{{ $i }}" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                    </div>
                                    <div class="flex flex-1" >
                                        <x-forms.input-form name="Training Center" type="text" placeholder="Training Center" model="trainings.{{ $i }}.center" id="training-center-{{ $i }}" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                    </div>
                                    <div class="flex flex-1 gap-3" >
                                        <x-forms.input-form name="Total Training Hours" type="number" placeholder="Total Training Hours" model="trainings.{{ $i }}.hours" id="training-hours-{{ $i }}" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                        <x-forms.file name="Upload Certificate" placeholder="Upload Certificate" model="trainings.{{ $i }}.certificate" id="certificate-{{ $i }}" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" wire:click="popInput()" id="remove-trainings" class="flex items-center gap-2 rounded-md text-red-700 -top-1/4 right-0 px-3 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            Remove
                        </button>
                        <button type="button" wire:click="addInput()" id="add-trainings" class="flex items-center gap-2 bg-green-500 rounded-md text-white -top-1/4 right-0 px-3 py-2">
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
                            <input @change="currentStatus = 'student'" id="student" type="radio" value="student" wire:model="currentStatus" name="current-status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="student" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input checked @change="currentStatus = 'professional'" id="professional" type="radio" wire:model="currentStatus" value="professional" name="current-status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
                            <x-forms.select name="Year Level" model="yearLevel" id="year-level" :options="['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6']" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                    </div>
                </div>
                <div x-show="currentStatus == 'professional'">
                    <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Employment Information</h1>
                    <div class="flex md:flex-row flex-col w-full gap-3">
                        <div class="flex md:flex-row flex-col basis-3/4 gap-3">
                            <x-forms.input-form name="Present Office" type="text" placeholder="Present Office" model="presentOffice" id="present-office" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                        <div class="flex md:flex-row flex-col basis-1/4 gap-3">
                            <x-forms.input-form name="Telephone Number" type="number" placeholder="Telephone Number" model="telNum" id="telephoneNumber" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col w-full gap-3">
                        <div class="flex md:flex-row flex-col basis-3/4 gap-3">
                            <x-forms.input-form name="Office Address" type="text" placeholder="Office Address" model="officeAddress" id="office-address" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                        <div class="flex flex-col basis-1/4 gap-3">
                            <h1 class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Office Category</h1>
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input id="government" type="radio" value="government" wire:model="officeCategory" name="office-category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="government" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gov't</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="private" type="radio" value="private" wire:model="officeCategory" name="office-category" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="private" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Private</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col w-full gap-3">
                        <div class="flex md:flex-row flex-col basis-3/4 gap-3">
                            <x-forms.input-form name="Designation / Position " type="text" placeholder="Designation / Position " model="designationPosition" id="designation-position" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                        <div class="flex md:flex-row flex-col basis-1/4 gap-3">
                            <x-forms.input-form name="No. of years in present position" type="number" placeholder="No. of years in present position" model="yearsPresentPosition" id="yearsPresentPosition" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">For Programming: <b>Check the language that you will use in the exam</b></h1>
                    <div class="flex mb-3">
                        <div class="flex flex-1 items-center mr-4">
                            <input id="visual-basic" type="radio" value="Visual Basic 6.0" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="visual-basic" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Visual Basic 6.0</label>
                        </div>
                        <div class="flex flex-1 items-center mr-4">
                            <input id="cpp" type="radio" value="c++" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="cpp" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C++</label>
                        </div>
                        <div class="flex flex-1 items-center mr-4">
                            <input id="c-language" type="radio" value="C Language" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="c-language" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C Language</label>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-1 items-center mr-4">
                            <input id="vb-net" type="radio" value="VB.NET" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="vb-net" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">VB.NET</label>
                        </div>
                        <div class="flex flex-1 items-center mr-4">
                            <input id="c-sharp" type="radio" value="C#" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="c-sharp" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">C#</label>
                        </div>
                        <div class="flex flex-1 items-center mr-4">
                            <input id="java" type="radio" value="Java" name="pl" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="java" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Java</label>
                        </div>
                    </div>
                </div>
                <br />
                <hr />
            </div>
            <div x-show="state == 4">
                <div x-show="currentStatus == 'student'">
                    <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                    <div class="w-full md:w-4/5 flex gap-3">
                        <x-forms.file name="Upload Passport Size Image" placeholder="Upload Passport Size Image" model="passport" id="passport" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.file name="Diploma / TOR" placeholder="Diploma / TOR" model="psa" id="psa" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                    <div class="w-full md:w-2/5 flex gap-3">
                        <x-forms.file name="COE / COG" placeholder="COE / COG" model="cert" id="certs" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                </div>
                <div x-show="currentStatus == 'professional'">
                    <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                    <div class="w-full md:w-4/5 flex gap-3">
                        <x-forms.file name="Valid ID" placeholder="Valid ID" model="validId" id="valid-id" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        <x-forms.file name="Diploma / TOR" placeholder="Diploma / TOR" model="diploma" id="diploma" accept=".pdf,.doc,.docx" classes="mb-3 md:mb-6 flex-1 flex-col" />
                    </div>
                </div>
                <br />
                <hr />

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
                            <input type="text" hidden name="signature" id="signature" wire:model="signature" />
                        </div>
                        <div class="flex gap-3">
                            <button type="button" id="clear-btn">Clear</button>
                            <a href="#" @click.prevent id="save-btn" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Save</a>
                        </div>
                    </div>
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
