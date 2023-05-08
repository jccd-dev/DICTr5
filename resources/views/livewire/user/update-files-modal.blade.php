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
            <div class="w-full flex flex-col items-center">
                <div class="w-full">
                    <div x-show="currentStatus == 'student'">
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                        <div class="w-full md:w-4/5 flex gap-3">
                            <x-forms.file name="Upload Passport Size Image (required for students)" placeholder="Upload Passport Size Image" model="passport" id="passport" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            <x-forms.file name="PSA Birth Certificate (required for students)" placeholder="PSA Birth Certificate" model="psa" id="psa" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                        <div class="w-full md:w-2/5 flex gap-3">
                            <x-forms.file name="COE / COG (required for students)" placeholder="COE / COG" model="cert" id="certs" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                    </div>
                    <div x-show="currentStatus == 'professional'">
                        <h1 class="font-bold font-quicksand text-xl flex self-start my-4">Required Documents</h1>
                        <div class="w-full md:w-4/5 flex gap-3">
                            <x-forms.file name="Valid ID (required for professional)" placeholder="Valid ID" model="validId" id="valid-id" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" />
                            <x-forms.file name="Diploma / TOR (required for prefessional)" placeholder="Diploma / TOR" model="diploma" id="diploma" accept=".pdf,.doc,.docx,image/*" classes="mb-3 md:mb-6 flex-1 flex-col" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
