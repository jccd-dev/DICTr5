<div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800 px-10 pt-10">
    <div class="font-quicksand flex gap-3 items-center">
        <x-datetime-picker
            placeholder="Appointment Date"
            display-format="MM - DD - YYYY"
            without-time="true"
            wire:model.defer="displayFormat"
            class="bg-custom-blue bg-opacity-10 border-0 font-semibold"
        />
        <b>-</b>
        <x-datetime-picker
            placeholder="Appointment Date"
            display-format="MM - DD - YYYY"
            without-time="true"
            wire:model.defer="displayFormat"
            class="bg-custom-blue bg-opacity-10 border-0 font-semibold"
        />
    </div>
    <label for="table-search" class="sr-only">Search</label>
    <div class="flex gap-5">
        <div class="relative h-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block h-full p-2.5 font-quicksand pl-10 text-base text-gray-900 border-0 rounded-lg w-48 bg-[#E6EEF6] focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
        </div>
        <div>
            <button
                @click="$openModal('myModal')"
                type="button"
                class="font-bold font-quicksand bg-custom-blue bg-opacity-10 hover:bg-opacity-20 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 -ml-2 text-dark-blue">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Add
            </button>
        </div>
    </div>
</div>
