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
        <div class="flex items-center justify-between py-4 dark:bg-gray-800 px-10 pt-10">
            <div class="font-quicksand flex gap-3 items-center" wire:ignore>
                <div class="relative bg-custom-blue bg-opacity-10 border-0 font-semibold rounded-xl flex">
                    <div class="absolute top-0 left-0 h-full px-3 flex items-center bg-custom-blue bg-opacity-10 rounded-tl-xl rounded-bl-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-custom-blue">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                    </div>

                    <x-datetime-picker
                        placeholder="Start Date"
                        display-format="MM - DD - YYYY"
                        without-time="true"
                        wire:model="from"
                        class="bg-transparent border-none outline-none shadow-none drop-shadow-none py-2.5 pl-14 max-w-[13rem]"
                    />
                </div>
                <b>-</b>
                <div class="relative bg-custom-blue bg-opacity-10 border-0 font-semibold rounded-xl flex">
                    <div class="absolute top-0 left-0 h-full px-3 flex items-center bg-custom-blue bg-opacity-10 rounded-tl-xl rounded-bl-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-custom-blue">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                    </div>

                    <x-datetime-picker
                        placeholder="End Date"
                        display-format="MM - DD - YYYY"
                        without-time="true"
                        wire:model="to"
                        class="bg-transparent border-none outline-none shadow-none drop-shadow-none py-2.5 pl-14 max-w-[13rem]"
                    />
                </div>
            </div>
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
                            Banner Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data) && count($data) > 0)
                        @foreach($data as $key => $val)
                            @if($key % 2 === 0)
                                <tr class="bg-[#FDC500] bg-opacity-25">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $val->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ date("M j, Y", strtotime($val->timestamp)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $val->button_links }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="#" class="font-medium hover:underline flex gap-2 items-center bg-custom-blue bg-opacity-10 py-2 px-3 rounded-2xl w-fit" @click="$openModal('updateModal'); updateBannerID = {{ $val->id }}" wire:click="get_banner_data({{ $val->id }})">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1295_612)">
                                                <path d="M8.70801 1.58325H7.12467C3.16634 1.58325 1.58301 3.16659 1.58301 7.12492V11.8749C1.58301 15.8333 3.16634 17.4166 7.12467 17.4166H11.8747C15.833 17.4166 17.4163 15.8333 17.4163 11.8749V10.2916" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12.698 2.39091L6.45966 8.62924C6.22216 8.86674 5.98466 9.33383 5.93716 9.67425L5.59674 12.0572C5.47008 12.9201 6.07966 13.5217 6.94258 13.403L9.32549 13.0626C9.65799 13.0151 10.1251 12.7776 10.3705 12.5401L16.6088 6.30174C17.6855 5.22508 18.1922 3.97424 16.6088 2.39091C15.0255 0.807578 13.7747 1.31424 12.698 2.39091Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M11.8037 3.2854C12.0662 4.21756 12.5637 5.0667 13.2485 5.75148C13.9332 6.43625 14.7824 6.93372 15.7145 7.19623" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1295_612">
                                                <rect width="19" height="19" fill="white"/>
                                                </clipPath>
                                                </defs>
                                                </svg>

                                            <span class="font-semibold">Edit</span>
                                        </a>
                                        @can('admin_only', auth('jwt')->user())
                                        <a href="#" data-modal-target="deleteModal3" data-modal-show="deleteModal3" class="font-medium hover:underline flex gap-2 items-center bg-custom-red bg-opacity-10 py-2 px-3 rounded-2xl w-fit" @click="deleteItem = {{ $val->id }}">
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.625 4.73409C13.9888 4.47284 11.3367 4.33825 8.6925 4.33825C7.125 4.33825 5.5575 4.41742 3.99 4.57575L2.375 4.73409M6.72917 3.9345L6.90333 2.89742C7.03 2.14534 7.125 1.58325 8.46292 1.58325H10.5371C11.875 1.58325 11.9779 2.177 12.0967 2.90534L12.2708 3.9345M14.9229 7.23575L14.4083 15.2078C14.3213 16.4508 14.25 17.4166 12.0413 17.4166H6.95875C4.75 17.4166 4.67875 16.4508 4.59167 15.2078L4.07708 7.23575M8.17792 13.0624H10.8142M7.52083 9.89575H11.4792" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            <span class="font-semibold">Delete</span>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-[#FDC500] bg-opacity-10">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $val->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ date("M j, Y", strtotime($val->timestamp)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $val->button_links }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="#" class="font-medium hover:underline flex gap-2 items-center bg-custom-blue bg-opacity-10 py-2 px-3 rounded-2xl w-fit" @click="$openModal('updateModal'); updateBannerID = {{ $val->id }}" wire:click="get_banner_data({{ $val->id }})">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1295_612)">
                                                <path d="M8.70801 1.58325H7.12467C3.16634 1.58325 1.58301 3.16659 1.58301 7.12492V11.8749C1.58301 15.8333 3.16634 17.4166 7.12467 17.4166H11.8747C15.833 17.4166 17.4163 15.8333 17.4163 11.8749V10.2916" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12.698 2.39091L6.45966 8.62924C6.22216 8.86674 5.98466 9.33383 5.93716 9.67425L5.59674 12.0572C5.47008 12.9201 6.07966 13.5217 6.94258 13.403L9.32549 13.0626C9.65799 13.0151 10.1251 12.7776 10.3705 12.5401L16.6088 6.30174C17.6855 5.22508 18.1922 3.97424 16.6088 2.39091C15.0255 0.807578 13.7747 1.31424 12.698 2.39091Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M11.8037 3.2854C12.0662 4.21756 12.5637 5.0667 13.2485 5.75148C13.9332 6.43625 14.7824 6.93372 15.7145 7.19623" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1295_612">
                                                <rect width="19" height="19" fill="white"/>
                                                </clipPath>
                                                </defs>
                                                </svg>

                                            <span class="font-semibold">Edit</span>
                                        </a>
                                        @can('admin_only', auth('jwt')->user())
                                        <a href="#" data-modal-target="deleteModal3" data-modal-show="deleteModal3" class="font-medium hover:underline flex gap-2 items-center bg-custom-red bg-opacity-10 py-2 px-3 rounded-2xl w-fit" @click="deleteItem = {{ $val->id }}">
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.625 4.73409C13.9888 4.47284 11.3367 4.33825 8.6925 4.33825C7.125 4.33825 5.5575 4.41742 3.99 4.57575L2.375 4.73409M6.72917 3.9345L6.90333 2.89742C7.03 2.14534 7.125 1.58325 8.46292 1.58325H10.5371C11.875 1.58325 11.9779 2.177 12.0967 2.90534L12.2708 3.9345M14.9229 7.23575L14.4083 15.2078C14.3213 16.4508 14.25 17.4166 12.0413 17.4166H6.95875C4.75 17.4166 4.67875 16.4508 4.59167 15.2078L4.07708 7.23575M8.17792 13.0624H10.8142M7.52083 9.89575H11.4792" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            <span class="font-semibold">Delete</span>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr class="bg-[#FDC500] bg-opacity-10">
                            <td colspan="4" class="text-center px-6 py-3">
                                No data
                            </td>
                        </tr>
                    @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <x-modal.card title="Add Slider" blur wire:model="myModal">
        <div class="w-full">
            {{-- {{ slider banner form accept String title, File image, Text description, and String button_links }} --}}

            <form class="w-full" x-data="{ dragging: true }">
                <div class="mb-6">
                    {{--      TITLE      --}}
                    <div>
                        <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input
                            type="text"
                            id="Name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Name"
                            wire:model="title"
                        >
                        @error('title') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="Website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                        <input
                            type="url"
                            id="Website"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.sample.link"
                            wire:model="button_links"
                        >
                        @error('button_links') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <x-forms.textarea-form name="Description" required="false" placeholder="" model="description" id="" rows="10"  />

                </div>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 overflow-hidden border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex justify-center items-center">
                            @if($image)
                                <div id="img-thumbnail">
                                    <img src="{{ $image->temporaryUrl() }}" alt="">
                                </div>
                            @else
                                <div id="ins-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                            @endif
                        </div>
                        <input id="dropzone-file"
                               type="file"
                               accept="image/*"
                               class="hidden"
                               wire:model="image"
                        />
                        @error('image') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </label>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end">
                        <button type="button" wire:click="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                    </div>
                </x-slot>
            </form>

        </div>
    </x-modal.card>
    <x-modal.card title="Update Slider" blur wire:model="updateModal">
        <div class="w-full">
{{--             {{ slider banner form accept String title, File image, Text description, and String button_links }}--}}

            <form class="w-full" x-data="{ dragging: true }">
                <div class="mb-6">

                          TITLE
                    <div>
                        <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input
                            type="text"
                            id="Name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Name"
                            wire:model="title"
                        >
                        @error('title') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="Website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                        <input
                            type="url"
                            id="Website"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="https://www.sample.link"
                            wire:model="button_links"
                        >
                        @error('button_links') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <x-forms.textarea-form name="Description" required="false" placeholder="" model="description" id="" rows="10"  />

                </div>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 overflow-hidden border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex justify-center items-center">
                            @if(isset($image))
                                @if($image)
                                    <div id="img-thumbnail">
                                        <img src="{{ $image->temporaryUrl() }}" alt="">
                                    </div>
                                @else
                                    <div id="ins-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                @endif

                            @else
                                <div id="img-thumbnail">
                                    @if($temp_image)
                                        <img src="{{ asset('storage/images/'.$temp_image) }}" alt="">
                                    @endif
                                </div>
                                @if(!$temp_image)
                                    <div id="ins-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <input id="dropzone-file"
                               type="file"
                               accept="image/*"
                               class="hidden"
                               wire:model="image"
                        />
                    </label>
                </div>
                <x-slot name="footer">
                    <div class="flex justify-end">
                        <button type="button" @click="$wire.update_banner(updateBannerID)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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
                    <button @click="$wire.delete_banner(deleteItem)" data-modal-hide="deleteModal3" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
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
    </script>
    @vite('resources/js/admin/slider.js')
</div>
