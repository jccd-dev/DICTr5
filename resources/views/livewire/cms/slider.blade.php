<div x-init="">
    <div class="relative overflow-x-auto shadow-md rounded-2xl" wire:ignore>
        <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800 px-10 pt-10">
            <div class="font-quicksand flex gap-3 items-center">
                <div class="relative bg-custom-blue bg-opacity-10 border-0 font-semibold rounded-xl flex">
                    <div class="absolute top-0 left-0 h-full px-3 flex items-center bg-custom-blue bg-opacity-10 rounded-tl-xl rounded-bl-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-custom-blue">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                    </div>

                    <x-datetime-picker
                        placeholder="Appointment Date"
                        display-format="MM - DD - YYYY"
                        without-time="true"
                        wire:model.defer="displayFormat"
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
                        placeholder="Appointment Date"
                        display-format="MM - DD - YYYY"
                        without-time="true"
                        wire:model.defer="displayFormat"
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
        <div class="px-10 pb-10 bg-white">
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
                    @if(isset($data))
                        @foreach($data as $key => $val)
                            @if($key % 2 === 0)
                                <tr class="bg-[#FDC500] bg-opacity-25">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $val->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $val->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $val->button_links }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium hover:underline" @click="$openModal('updateModal')" wire:click="get_banner_data({{ $val->id }})">Edit</a>
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-[#FDC500] bg-opacity-10">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $val->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $val->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $val->button_links }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium hover:underline" @click="$openModal('updateModal')" wire:click="get_banner_data({{ $val->id }})">Edit</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td>
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
            {{-- {{ //TODO: slider banner form accept String title, File image, Text description, and String button_links }} --}}

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
{{--             {{ //TODO: slider banner form accept String title, File image, Text description, and String button_links }}--}}

            <form class="w-full" x-data="{ dragging: true }" wire:submit.prevent="update_banner">
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
                                        <img src="{{ asset('cms-images/'.$temp_image) }}" alt="">
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
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                    </div>
                </x-slot>
            </form>
        </div>
    </x-modal.card>
    <script>
        const datePickerIcons = document.querySelectorAll("[name='displayFormat']")
        datePickerIcons.forEach((el) => {
            el.nextElementSibling.firstElementChild.lastElementChild.remove()
        })
    </script>
</div>
