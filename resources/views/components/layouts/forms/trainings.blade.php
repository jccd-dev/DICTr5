{{ $count }}
@for($i = $count; $i > 0; $i--)
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

@endfor
