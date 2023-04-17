<div>
    <button onclick="modalHandler(true)" class="flex items-center gap-2 px-4 py-1 bg-[#00509D] bg-opacity-5 hover:bg-[#00509D] rounded">
        <svg xmlns="http://www.w3.org/2000/svg" height="15" stroke="#f5f5f5" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
        <span>Add</span>
    </button>
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
    <div
        id="posts-form"
        class="flex w-[30rem] posts-form"
        x-data="{ state: 1, hasVidData: false, err: [] }"
        x-init="listeners($data)"
        wire:ignore.self
    >
        <form action="#" method="POST" wire:submit.prevent="create_post" class="w-full flex flex-col">
            <div x-show="state == 1">
                <div class="mb-6">
                    <label for="post-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input
                        type="text"
                        id="post-title"
                        wire:model="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    />
                </div>
                <div class="mb-6">
                    <label for="post-excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
                    <textarea
                        id="post-excerpt"
                        wire:model="excerpt"
                        rows="3"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    ></textarea>
                    @error('content') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                </div>
                <div class="mb-6">
                    <label for="post-content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                    <textarea
                        id="post-content"
                        wire:model="content"
                        rows="5"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    ></textarea>
                    @error('content') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>
            <div x-show="state == 2">
                <div class="mb-6 flex-1">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Thumbnail</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="post-thumbnail"
                        id="post-thumbnail"
                        type="file"
                        wire:model="thumbnail"
                    />
                    @error('thumbnail') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                </div>
                <div class="mb-6 flex-1">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="post-status">
                        Status
                    </label>
                    <div class="pt-2">
                        <label class="relative inline-flex items-center mb-4 cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:model="status">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                            @if(!$status)
                                    <span class="text-dark-yellow">Unpublish</span>
                                @else
                                    <span class="text-green-600">Publish</span>
                                @endif
                        </span>
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
                        @if(!$images)
                            <div class="flex justify-center items-center">
                                <div id="ins-preview" class="flex flex-col items-center justify-center pt-5 pb-6">
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
                <div class="mb-6">
                    <label for="category-post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
                    <select id="category-post" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        <option value="">News</option>
                        <option value="">Announcements</option>
                        <option value="">Report</option>
                    </select>
                    @error('vid_link') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                </div><div class="mb-6">
                    <label for="post-vid_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video Url (optional)</label>
                    <input
                        type="url"
                        id="post-vid_link"
                        wire:model="vid_link"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    />
                    @error('vid_link') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                </div>
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
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // console.log(Alpine)
                Alpine.data("posts-form", (d) => {
                    console.log(d)
                });
            })

            function listeners($data) {
                window.addEventListener('ValidationErrors', function(event) {
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
                    console.log($data)
                    // let d = Alpine.data('posts-form').data
                });
            }
            let modal = document.getElementById("modal");
            function modalHandler(val) {
                if (val) {
                    fadeIn(modal);
                } else {
                    fadeOut(modal);
                }
            }
            function fadeOut(el) {
                el.style.opacity = 1;
                (function fade() {
                    if ((el.style.opacity -= 0.1) < 0) {
                        el.style.display = "none";
                    } else {
                        requestAnimationFrame(fade);
                    }
                })();
            }
            function fadeIn(el, display) {
                el.style.opacity = 0;
                el.style.display = display || "flex";
                (function fade() {
                    let val = parseFloat(el.style.opacity);
                    if (!((val += 0.2) > 1)) {
                        el.style.opacity = val;
                        requestAnimationFrame(fade);
                    }
                })();
            }
        </script>
    </div>

            </div>
        </div>
    </div>
        </div>
