<div class="w-[30rem] my-10">
    {{-- {{ //TODO: slider banner form accept String title, File image, Text description, and String button_links }} --}}

    <form class="w-full" x-data="{ dragging: true }" wire:submit.prevent="submit">
        <div class="mb-6">

            {{--      TITLE      --}}

            <x-forms.input-form name="Name" required="false" type="text" placeholder="Name" model="title"  />

            <x-forms.input-form name="website" required="false" type="url" placeholder="sample.link" model="button_links"  />

            <div>
                <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea
                    id="desc"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Place description here"
                    required
                    wire:model="description"
                ></textarea>
            </div>
        </div>

        <div class="flex items-center justify-center w-full"
             @drop.prevent="dragging = false; handleFile($event.dataTransfer.files[0])"
             @dragover.prevent="dragging = true"
             @dragleave.prevent="dragging = false"
             :class="{ 'border-gray-400 border-dashed border-2': dragging }">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex justify-center items-center">
                    <div id="img-thumbnail">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="">
                        @endif
                    </div>
                    @if(!$image)
                        <div id="ins-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                    @endif
                </div>
                <input x-ref="fileInput"
                       id="dropzone-file"
                       type="file"
                       accept="image/*"
                       class="hidden"
{{--                       @change="handleFile($event.target.files[0])"--}}
                       wire:model="image"
                />
            </label>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
