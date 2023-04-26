<div x-data="{ state: 1, hasVidData: false, err: [], stateUpdate: 1, hasVidDataUpdate: false, errUpdate: [], deleteImgName: '', deleteImgId: null, modalActive: 0, location1: 0, location2: 0 }"
     x-init="listeners($data); listenerUpdate($data); ">
{{--    <x-layouts.modal.button name="Add Post" target="add-post" />--}}
    <button
        data-modal-target="add-post"
        data-modal-toggle="add-post"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
        wire:click="resetFields()"
        @click="modalActive = 1"
    >

        Add Post

    </button>

    <a href="#" x-ref="deleteModal" type="button" data-modal-target="deleteModal" data-modal-show="deleteModal" class="hidden"></a>
    <a href="#" x-ref="deleteModal2" type="button" data-modal-target="deleteModal2" data-modal-show="deleteModal2" class="hidden"></a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <span class="sr-only">Action button</span>
                    Action
                    <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                    </div>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Author
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
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
            @if($posts)
                @foreach($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->author }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->category->category }}

                        </td>
                        <td class="px-6 py-4">
                            {{ $post->timestamp }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($post->published)
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Published
                                @else
                                    <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2"></div> Unpublished
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" type="button" wire:click="get_post_data({{ $post->id }})" @click="state=1; stateUpdate=1; modalActive = 2" data-modal-target="update-post" data-modal-show="update-post" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                            <a href="#" type="button" data-modal-target="deleteModal" data-modal-show="deleteModal" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete user</a>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>

    {{--  Modals  --}}

    {{--  Delete Modals  --}}

    <div id="deleteModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-[51] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
        <div class="relative w-full max-w-md max-h-full flex items-center">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                    <button @click="$wire.insertDeleteImg(JSON.stringify({[deleteImgId]: deleteImgName}))" data-modal-hide="deleteModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="deleteModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal2" tabindex="-1" class="fixed top-0 left-0 right-0 z-[51] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
        <div class="relative w-full max-w-md max-h-full flex items-center">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="deleteModal2">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                    <button @click="$wire.deleteTempImg(JSON.stringify({[location1]: location2}))" data-modal-hide="deleteModal2" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="deleteModal2" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>


    {{--  Post Modal  --}}

    <div wire:ignore.self id="add-post" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-auto max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="add-post">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 w-full">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Post</h3>
                    <div
                        id="posts-form"
                        class="flex w-[30rem] posts-form"

                        {{--    wire:ignore--}}
                    >
                        <form action="#" method="POST" wire:submit.prevent="create_post" class="w-full flex flex-col">
                            <div x-show="state == 1">

                                <x-forms.input-form name="Title" type="text" placeholder="Title" model="title" id="title" classes="mb-6" />

                                <x-forms.textarea-form name="Excerpt" placeholder="Excerpt" model="excerpt" id="excerpt" rows="3" classes="mb-6" />

                                <x-forms.textarea-form name="Content" placeholder="Content" model="content" id="content" rows="5" classes="mb-6" />

                            </div>
                            <div x-show="state == 2">
                                <x-forms.file name="Thumbnail" placeholder="Thumbnail" model="thumbnail" id="thumbnail" accept="image/*" classes="mb-6" />

                                <div class="mb-6 flex-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="post-status">
                                        Status
                                    </label>
                                    <div class="pt-2">
                                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                            <x-toggle lg label="" wire:model.defer="status" />
                                        </label>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        @if($images)
                                            <div id="img-thumbnail" class="flex flex-wrap w-full h-full gap-2 p-2">
                                                @foreach($images as $image)
                                                    <div class="w-24 h-24">
                                                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover" alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
{{--                                        {{ dd(!!$images) }}--}}
                                        @if(!$images)
                                            <div class="flex justify-center items-center">
                                                <div id="ins-previe" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                </div>
                                            </div>
                                        @endif
                                        <input id="dropzone-file"
                                               type="file"
                                               accept="image/*"
                                               class="hidden"
                                               wire:model="images"
                                               multiple
                                        />
                                    </label>
                                    @error('images.*') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div x-show="state == 3">
                                <x-forms.select name="Category" model="category_id" id="category" :options="$all_category" classes="mb-6" />

                                <x-forms.input-form name="Link" type="url" placeholder="Video Link" model="vid_link" id="video_link" classes="mb-6" />

                            </div>

                            <div class="flex gap-3 mt-5">
                                <button :class="state == 1 ? 'cursor-not-allowed' : ''" :disabled="state == 1" @click="state--" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 flex-1">
                                    Back
                                </button>
                                <button x-show="state != 3" type="button" @click="state++;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1">
                                    Next
                                </button>

                                <button x-show="state == 3" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1">
                                    Add Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--  Update Post  --}}

    <div wire:ignore.self id="update-post" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-auto max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="update-post">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8 w-full">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Post</h3>
                    <div
                        id="posts-form"
                        class="flex w-[30rem] posts-form"

                        {{--    wire:ignore--}}
                    >
                        <form action="#" method="POST" wire:submit.prevent="updatePost" class="w-full flex flex-col" >
                            <div x-show="stateUpdate == 1">

                                <x-forms.input-form name="Title" type="text" placeholder="Title" model="title" classes="mb-6" value="title" />

                                <x-forms.textarea-form name="Excerpt" placeholder="Excerpt" model="excerpt" rows="3" classes="mb-6" value="excerpt" />

                                <x-forms.textarea-form name="Content" placeholder="Content" model="content" rows="5" classes="mb-6" value="content" />

                            </div>
                            <div x-show="stateUpdate == 2">

                                <x-forms.file name="Thumbnails" placeholder="Thumbnail" model="thumbnail" classes="mb-6" :th="$thumbnail" />

                                <div class="mb-6 flex-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="post-status">
                                        Status
                                    </label>
                                    <div class="pt-2">
                                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                            <x-toggle lg label="" wire:model.lazy="status" />
                                        </label>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center justify-center w-full">
                                    <label for="#" @click="$refs.dropzoneFile.click()" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        @if(isset($to_update_data['images']))
                                            @if($to_update_data['images'])
                                                <div id="img-thumbnail" class="flex flex-wrap w-full h-full gap-2 p-2">
                                                    @foreach($to_update_data['images'] as $key => $val)
                                                        @foreach($val as $k => $v)
                                                            <div class="w-24 h-24 relative">
                                                            <span class="absolute top-0 right-0 z-50" @click.stop>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 text-red-500" @click="$refs.deleteModal.click(); deleteImgName = '{{ $v }}'; deleteImgId = {{ $k }}; ">
                                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </span>
                                                                <img src="{{ asset('cms-images/'.$v) }}" class="w-full h-full object-cover cursor-default" @click.stop alt="">
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                    @foreach($temp_images as $key => $val)
                                                        @foreach($val as $k => $v)
                                                            <div class="w-24 h-24 relative">
                                                        <span class="absolute top-0 right-0 z-50" @click.stop>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 text-red-500" @click="$refs.deleteModal2.click(); location1 = '{{ $key }}'; location2 = {{ $k }}; ">
                                                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </span>
                                                                <img src="{{ $v->temporaryUrl() }}" class="w-full h-full object-cover cursor-default" @click.stop alt="">
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                    @foreach($images as $img)
                                                        <div class="w-24 h-24">
                                                            <img src="{{ $img->temporaryUrl() }}" class="w-full h-full object-cover" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endif
                                            @if(!$images && isset($to_update_data['images']))
                                                @if(!$to_update_data['images'])
                                                    <div class="flex justify-center items-center">
                                                        <div id="ins-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        <input id="dropzone-file"
                                               type="file"
                                               accept="image/*"
                                               class="hidden"
                                               wire:model.lazy="images"
                                               x-ref="dropzoneFile"
                                               multiple
                                        />
                                    </label>
                                    @error('images.*') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div x-show="stateUpdate == 3">

                                <x-forms.select name="Category" model="category_id" :options="$all_category" classes="mb-6" value="category_id" />

                                <x-forms.input-form name="Link" type="url" placeholder="Video Link" model="vid_link" classes="mb-6" value="vid_link" />

                            </div>

                            <div class="flex gap-3 mt-5">
                                <button :class="stateUpdate == 1 ? 'cursor-not-allowed' : ''" :disabled="stateUpdate == 1" @click="stateUpdate--" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 flex-1">
                                    Back
                                </button>
                                <button x-show="stateUpdate != 3" type="button" @click="stateUpdate++;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1">
                                    Next
                                </button>

                                <button x-show="stateUpdate == 3" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex-1">
                                    Add Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            Alpine.data("posts-form", (d) => {
                console.log(d)
            });
        })

        function listeners($data) {

            window.addEventListener('ValidationErrors', validationHandler);
            window.addEventListener('ValidationSuccess', (event) => {
                location.reload();
            });

            function validationHandler(event) {
                const postsForm = document.querySelector('.posts-form');
                let hasSectionOneError = event.detail.hasOwnProperty('title')
                    || event.detail.hasOwnProperty('excerpt')
                    || event.detail.hasOwnProperty('content');

                let hasSectionTwoError = event.detail.hasOwnProperty('thumbnail')
                    || event.detail.hasOwnProperty('status')
                    || event.detail.hasOwnProperty('images');
                let hasSectionThreeError = event.detail.hasOwnProperty('vid_link')
                    || event.detail.hasOwnProperty('categories');

                if(hasSectionOneError) {
                    $data.state = 1;
                } else if(hasSectionTwoError) {
                    $data.state = 2;
                } else if (hasSectionThreeError) {
                    $data.state = 3;
                }
            }
        }

        function listenerUpdate($data) {
            window.addEventListener('validation-errors-update', validationHandler2);

            function validationHandler2(event) {
                const postsForm = document.querySelector('.posts-form');
                let hasSectionOneError = event.detail.hasOwnProperty('title')
                    || event.detail.hasOwnProperty('excerpt')
                    || event.detail.hasOwnProperty('content');

                let hasSectionTwoError = event.detail.hasOwnProperty('thumbnail')
                    || event.detail.hasOwnProperty('status')
                    || event.detail.hasOwnProperty('images');
                let hasSectionThreeError = event.detail.hasOwnProperty('vid_link')
                    || event.detail.hasOwnProperty('categories');

                if(hasSectionOneError) {
                    $data.stateUpdate = 1;
                } else if(hasSectionTwoError) {
                    $data.stateUpdate = 2;
                } else if (hasSectionThreeError) {
                    $data.stateUpdate = 3;
                }
            }
        }
    </script>
</div>
