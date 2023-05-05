<div class="relative" x-init="" x-data="{ updateBannerID: 0, deleteItem: 0 }" id="slider-con">
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
    <div class="relative shadow-md rounded-2xl bg-white">
        <div class="flex items-center justify-end py-4 dark:bg-gray-800 px-10 pt-10">
            <label for="table-search" class="sr-only">Search</label>
            <div class="flex gap-5">
                <div class="relative h-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" wire:model="search" class="block h-full p-2.5 font-quicksand pl-10 text-base text-gray-900 border-0 rounded-lg w-48 bg-[#E6EEF6] focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
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
        <div class="px-10 pb-10">
            <div class="rounded-2xl overflow-hidden">
                <table class="w-full text-black text-sm text-left font-quicksand">
                    <thead class="text-sm uppercase bg-[#FDC500] dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data))
                        @foreach($data as $key => $val)
                            @if($key % 2 === 0)
                                <tr class="bg-[#FDC500] bg-opacity-25">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $val->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $val->category }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" data-modal-target="deleteModal3" data-modal-show="deleteModal3" class="font-medium hover:underline text-custom-red" @click="deleteItem = {{ $val->id }}">Delete</a>
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-[#FDC500] bg-opacity-10">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $val->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $val->category }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" data-modal-target="deleteModal3" data-modal-show="deleteModal3" class="font-medium hover:underline text-custom-red" @click="deleteItem = {{ $val->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr class="bg-[#FDC500] bg-opacity-10">
                            <td colspan="4" class="text-center">
                                No data
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <x-modal.card title="Add Category" blur wire:model="myModal">
        <div class="w-full">
            {{-- {{ slider banner form accept String title, File image, Text description, and String button_links }} --}}

            <form class="w-full" x-data="{ dragging: true }">
                <div class="mb-6">
                    {{--      TITLE      --}}
                    <div>
                        <label for="Category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <input
                            type="text"
                            id="Category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Category"
                            wire:model="category"
                        >
                        @error('category') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>

                </div>
                <x-slot name="footer">
                    <div class="flex justify-end">
                        <button type="button" wire:click="create_category" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </x-slot>
            </form>

        </div>
    </x-modal.card>
    <div id="deleteModal3" tabindex="-1" class="fixed top-0 left-0 right-0 z-[51] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
        <div class="relative w-full max-w-md max-h-full flex items-center">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="deleteModal3">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                    <button @click="$wire.delete_category(deleteItem)" data-modal-hide="deleteModal3" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="deleteModal3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const datePickerIcons = document.querySelectorAll("[name='from'], [name='to']")
        datePickerIcons.forEach((el) => {
            el.nextElementSibling.firstElementChild.lastElementChild.remove()
        })


        const messageAlert = document.querySelector('#message-alert');
        const dismissAlert = document.querySelector('#dismiss-alert');
        const closeAlertBtn = document.querySelector('#closeAlertBtn');
        const headings = document.querySelectorAll("h3");

        let targetHeading;
        for (let i = 0; i < headings.length; i++) {
            if (headings[i].textContent === 'Add Category') {
                targetHeading = headings[i];
                break;
            }
        }

        closeAlertBtn.addEventListener('click', _ => {
            dismissAlert.classList.toggle("hidden")
            location.reload()
        })

        window.addEventListener('ValidationCategoryError', _ => {
            dismissAlert.classList.remove('hidden')
            messageAlert.textContent = "Error Adding Category"
            targetHeading.nextElementSibling.click()

            setTimeout(() =>{
                dismissAlert.classList.add('hidden')
                location.reload()
            }, 2000)
        })

        window.addEventListener('ValidationCategorySuccess', _ => {
            dismissAlert.classList.remove('hidden')
            messageAlert.textContent = "Successfully Added Category"
            targetHeading.nextElementSibling.click()

            setTimeout(() =>{
                dismissAlert.classList.add('hidden')
                location.reload()
            }, 2000)
        })

        window.addEventListener('DeleteCategorySuccess', _ => {
            dismissAlert.classList.remove('hidden')
            messageAlert.textContent = "Successfully Deleted Category"

            setTimeout(() =>{
                dismissAlert.classList.add('hidden')
            }, 2000)
        })
    </script>
</div>
