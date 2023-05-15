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
        <form action="#" method="POST" @submit.prevent="$wire.updateFiles(currentStatus, {{ $user_data[0]->id }})" class="w-full flex flex-col">
            <div class="w-full flex flex-col items-center">
                <div class="w-full">
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
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                        <div class="w-full md:w-4/5 flex gap-3">
                            <x-forms.file name="Upload Passport Size Image (required for students)" placeholder="Upload Passport Size Image" model="passport" id="passport" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" :th="$passport" />
                            <x-forms.file name="PSA Birth Certificate (required for students)" placeholder="PSA Birth Certificate" model="psa" id="psa" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" :th="$psa" />
                        </div>
                        <div class="w-full md:w-2/5 flex gap-3">
                            <x-forms.file name="COE / COG (required for students)" placeholder="COE / COG" model="cert" id="certs" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" :th="$cert" />
                        </div>
                    </div>
                    <div x-show="currentStatus == 'professional'">
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                        <div class="w-full md:w-4/5 flex gap-3">
                            <x-forms.file name="Valid ID (required for professional)" placeholder="Valid ID" model="validId" id="valid-id" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" :th="$validId" />
                            <x-forms.file name="Diploma / TOR (required for prefessional)" placeholder="Diploma / TOR" model="diploma" id="diploma" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" :th="$diploma" />
                        </div>
                    </div>
                    <div class="flex justify-end items-end w-full pt-5 border-t">
                        <div>
                            <button type="submit" class="text-white bg-dark-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-dark-blue dark:focus:ring-blue-800 flex-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
