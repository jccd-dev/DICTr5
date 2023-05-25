<div class="w-full mt-32 p-5">
    <div class="w-full flex flex-col justify-center">
        <h1 class="text-center font-bold font-inter text-2xl md:text-3xl">Services</h1>
        <p class="text-center text-base md:text-lg mt-3">Lorem ipsum dolor sit amet consectetur. Adipiscing pretium quam sapien leo magna.</p>
    </div>
    <div class="flex justify-center mt-20 gap-8 flex-wrap">
        <div class="card w-[10rem] h-[10rem] sm:w-[12rem] sm:h-[12rem] lg:w-[15rem] lg:h-[15rem] relative overflow-hidden rounded-xl">
            <div class="absolute -z-[1] w-full h-full top-0 left-0">
                <img src="{{ asset('/img/sample card img 2.jpg') }}" class="w-full h-full object-cover" alt="">
            </div>
            <div class="absolute top-1/3 left-0">
                <img src="{{ asset('/img/Map-1-right 1.png') }}" alt="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full bg-[#00296B] bg-opacity-75 -z-[1]"></div>
            <div class="text-white p-3">
                <h1 class="font-semibold text-xl">Tech4ED</h1>
                <span class="text-sm">enable • empower • transform </span>
            </div>
        </div>
        <div class="card w-[10rem] h-[10rem] sm:w-[12rem] sm:h-[12rem] lg:w-[15rem] lg:h-[15rem] relative overflow-hidden rounded-xl">
            <div class="absolute -z-[1] w-full h-full top-0 left-0">
                <img src="{{ asset('/img/sample card img 2.jpg') }}" class="w-full h-full object-cover" alt="">
            </div>
            <div class="absolute top-1/3 left-0">
                <img src="{{ asset('/img/Map-1-right 1.png') }}" alt="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full bg-custom-red bg-opacity-75 -z-[1]"></div>
            <div class="text-white p-3">
                <h1 class="font-semibold text-xl">Tech4ED</h1>
                <span class="text-sm">enable • empower • transform </span>
            </div>
        </div>
        <div class="card w-[10rem] h-[10rem] sm:w-[12rem] sm:h-[12rem] lg:w-[15rem] lg:h-[15rem] relative overflow-hidden rounded-xl">
            <div class="absolute -z-[1] w-full h-full top-0 left-0">
                <img src="{{ asset('/img/sample card img 2.jpg') }}" class="w-full h-full object-cover" alt="">
            </div>
            <div class="absolute top-1/3 left-0">
                <img src="{{ asset('/img/Map-1-right 1.png') }}" alt="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full bg-dark-yellow bg-opacity-[80%] -z-[1]"></div>
            <div class="text-white p-3">
                <h1 class="font-semibold text-xl">Tech4ED</h1>
                <span class="text-sm">enable • empower • transform </span>
            </div>
        </div>
        <div class="card w-[10rem] h-[10rem] sm:w-[12rem] sm:h-[12rem] lg:w-[15rem] lg:h-[15rem] relative overflow-hidden rounded-xl" data-modal-target="tech4ed_registration_modal" data-modal-toggle="tech4ed_registration_modal">
            <div class="absolute -z-[1] w-full h-full top-0 left-0">
                <img src="{{ asset('/img/sample card img 2.jpg') }}" class="w-full h-full object-cover" alt="">
            </div>
            <div class="absolute top-1/3 left-0">
                <img src="{{ asset('/img/Map-1-right 1.png') }}" alt="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full bg-custom-blue bg-opacity-75 -z-[1]"></div>
            <div class="text-white p-3">
                <h1 class="font-semibold text-xl">Register Tech4ed Course</h1>
                <span class="text-sm">Click here to register </span>
            </div>
        </div>
    </div>

    <!-- Tech4Ed modal -->
    <div id="tech4ed_registration_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tech4Ed Registration
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tech4ed_registration_modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <livewire:homepage.section.tech4ed-registration />
                </div>
            </div>
        </div>
    </div>
</div>
