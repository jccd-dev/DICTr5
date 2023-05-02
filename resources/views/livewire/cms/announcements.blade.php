<div class="p-2">
    <div class="flex flex-row">
        <div class="basis-3/5">
            <div class="flex flex-row">
                <div class="p-3">
                    <x-datetime-picker wire:model="from" without-time="true" />
                </div>
                <div class="p-3 mt-2">
                    <span class="">-</span>
                </div>
                <div class="p-3">
                    <x-datetime-picker wire:model="to" without-time="true" />
                </div>
                <div class="p-3">
                    <select wire:model="category" class="p-1 rounded drop-shadow-lg">
                        <option value="0">All</option>
                        @forelse ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="basis-2/5 ">
            <div class="flex flex-row-reverse">
                <div class="p-2">
                    <button wire:click="showModal('create_modal', true)" class="flex items-center gap-2 px-4 py-1 bg-[#00509D] bg-opacity-5 hover:bg-[#00509D] rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" height="15" stroke="#f5f5f5" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        <span>Add</span>
                    </button>
                </div>
                <div class="p-2 mr-3">
                    <div class="relative">
                        <div class="absolute top-1/2 left-3 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#474747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </div>
                        <input type="search" wire:model="search" id="search" class="w-56 drop-shadow-lg bg-[#00509D] bg-opacity-5 px-3 pl-10 py-2 rounded-md text-[#474747] text-sm" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-light w-full">
        <tbody>
            <tr class="font-bold border-b-2 border-slate-900">
                <td>Title</td>
                <td>Author</td>
                <td>Category</td>
                <td>Start Duration</td>
                <td>End Duration</td>
                <td>Status</td>
                <td class="text-center">Action</td>
            </tr>
        </tbody>
        @forelse ($announcements as $ann)
            <tr>
                <td>{{$ann->title}}</td>
                <td>{{$ann->author_name}}</td>
                <td>{{$ann->category}}</td>
                <td>{{date('M d, Y h:ia', strtotime($ann->start_duration))}}</td>
                <td>{{date('M d, Y h:ia', strtotime($ann->end_duration))}}</td>
                <td>
                    <div class="text-xs font-semibold {{($ann->status) ? 'bg-yellow-200 w-20' : 'bg-slate-400 w-24'}} py-1 px-2 rounded text-center">
                        {{($ann->status) ? 'Prioritized' : 'Unpublished'}}
                    </div>
                </td>
                <td class="text-center">
                    <button wire:click="to_update_announcement('{{$ann->id}}')" class="px-2 py-1 m-1 mr-0 bg-[#00509D] bg-opacity-40 rounded-md">Edit</button>
                    <button onclick="delete_confirm('{{$ann->id}}')" class="px-2 py-1 m-1 ml-0 bg-[#C1121F] bg-opacity-40 rounded-md">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Announcement Found</td>
            </tr>
        @endforelse
    </table>

    {{-- MODAL --}}
    {{-- Temporary | Got from internet --}}
    <x-modal blur wire:model.defer="create_modal">
        <x-card title="Create Announcement">
            <div class="px-3">
                <form wire:submit.prevent="create_announcement">
                    @csrf
                    <label for="title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Announcement Title</label>
                    <input wire:model.lazy="insertAnnArray.title" id="title" class="mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border  @error('title') {{'border-red-600'}} @enderror" placeholder="Enter Announcement Title" />
                    @error('title') <p wire:ignore class="mb-3 text-xs text-red-600 italic">{{ $message }}</p> @enderror

                    <br>
                    <label for="excerpt" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Short Decription</label>
                    <div class="mb-5 mt-2">
                        <input wire:model.lazy="insertAnnArray.excerpt" id="excerpt" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border @error('excerpt') {{'border-red-600'}} @enderror" placeholder="Enter Short Description" />
                        @error('excerpt') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                    </div>

                    <label for="content" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Content</label>
                    <div class="mb-5 mt-2" wire:ignore>
                        <textarea id="content" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 rounded border @error('content') {{'border-red-600'}} @enderror"></textarea>
                    </div>
                    @error('content') <p class="text-xs text-red-600 italic mb-3">{{ $message }}</p> @enderror

                    <div class="flex flex-row">
                        <div class="basis-4/12 mr-2">
                            <label for="category" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Categories</label>
                            <x-select
                                wire:model="insertAnnArray.cat_id"
                                placeholder="Category"
                                :async-data="route('api.request.category')"
                                option-label="category"
                                option-value="id"
                                hide-empty-message
                            >
                                <x-slot name="afterOptions" class="p-2 flex justify-center" x-show="displayOptions.length === 0">
                                    <x-button
                                        x-on:click="$wire.create_category(search)"
                                        primary
                                        flat
                                        full>
                                        <span x-html="`Create category <b>${search}</b>`"></span>
                                    </x-button>
                                </x-slot>
                            </x-select>
                            @error('cat_id') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="basis-8/12">
                            <span class="text-sm font-bold text-zinc-900">Duration</span>
                            <div class="flex flex-row">
                                <div class="basis-3/6 mr-1">
                                    <x-datetime-picker
                                        placeholder="Starting Date & Time"
                                        parse-format="YYYY-MM-DD HH:mm:ss"
                                        interval="30"
                                        without-timezone="true"
                                        wire:model.defer="insertAnnArray.start_duration"
                                    />
                                    @error('start_duration') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                                </div>
                                <div class="basis-3/6 ml-1">
                                    <x-datetime-picker
                                        placeholder="End Date & Time"
                                        parse-format="YYYY-MM-DD HH:mm:ss"
                                        interval="30"
                                        without-timezone="true"
                                        wire:model.lazy="insertAnnArray.end_duration"
                                    />
                                    @error('end_duration') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 mb-5">
                        <div x-data="{ open: false }" class="relative">
                            <x-toggle label="Published & Prioritize" wire:model.defer="isPublished" @mouseenter="open = true" @mouseleave="open = false" />
                            <div x-show="open" class="bg-white shadow-lg rounded p-4 absolute top-full left-0 mt-2">
                                <span class="font-semibold text-sm">This announcement will be automatically prioritize, which means this will appear on the homepage</span>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center justify-start w-full">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>
            </div>

        </x-card>
    </x-modal>

    {{--  Update Modal  --}}
    <x-modal blur wire:model.defer="update_modal">
        <x-card title="Update Announcement">
            <div class="px-3">
                <form wire:submit.prevent="update_announcement">
                    @csrf
                    <label for="title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Announcement Title</label>
                    <input wire:model.lazy="updateAnnArray.title" id="title" class="mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border  @error('title') {{'border-red-600'}} @enderror" placeholder="Enter Announcement Title" />
                    @error('title') <p wire:ignore class="mb-3 text-xs text-red-600 italic">{{ $message }}</p> @enderror

                    <br>
                    <label for="excerpt" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Short Decription</label>
                    <div class="mb-5 mt-2">
                        <input wire:model.lazy="updateAnnArray.excerpt" id="excerpt" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border @error('excerpt') {{'border-red-600'}} @enderror" placeholder="Enter Short Description" />
                        @error('excerpt') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                    </div>

                    <label for="content" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Content</label>
                    <div class="mb-5 mt-2" wire:ignore>
                        <textarea id="update_content" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 rounded border @error('content') {{'border-red-600'}} @enderror"></textarea>
                    </div>
                    @error('content') <p class="text-xs text-red-600 italic mb-3">{{ $message }}</p> @enderror

                    <div class="flex flex-row">
                        <div class="basis-4/12 mr-2">
                            <label for="category" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Categories</label>
                            <x-select
                                wire:model="updateAnnArray.cat_id"
                                placeholder="Category"
                                :async-data="route('api.request.category')"
                                option-label="category"
                                option-value="id"
                                hide-empty-message
                            >
                                <x-slot name="afterOptions" class="p-2 flex justify-center" x-show="displayOptions.length === 0">
                                    <x-button
                                        x-on:click="$wire.create_category(search)"
                                        primary
                                        flat
                                        full>
                                        <span x-html="`Create category <b>${search}</b>`"></span>
                                    </x-button>
                                </x-slot>
                            </x-select>
                            @error('cat_id') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>

                        <div class="basis-8/12">
                            <span class="text-sm font-bold text-zinc-900">Duration</span>
                            <div class="flex flex-row">
                                <div class="basis-3/6 mr-1">
                                    <x-datetime-picker
                                        placeholder="Starting Date & Time"
                                        parse-format="YYYY-MM-DD HH:mm:ss"
                                        interval="30"
                                        without-timezone="true"
                                        wire:model.defer="updateAnnArray.start_duration"
                                    />
                                    @error('start_duration') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                                </div>
                                <div class="basis-3/6 ml-1">
                                    <x-datetime-picker
                                        placeholder="End Date & Time"
                                        parse-format="YYYY-MM-DD HH:mm:ss"
                                        interval="30"
                                        without-timezone="true"
                                        wire:model.lazy="updateAnnArray.end_duration"
                                    />
                                    @error('end_duration') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 mb-5">
                        <div x-data="{ open: false }" class="relative">
                            <x-toggle label="Published & Prioritize" wire:model.defer="isUpdatedPublished" @mouseenter="open = true" @mouseleave="open = false" />
                            <div x-show="open" class="bg-white shadow-lg rounded p-4 absolute top-full left-0 mt-2">
                                <span class="font-semibold text-sm">This announcement will be automatically prioritize, which means this will appear on the homepage</span>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center justify-start w-full">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Update</button>
                    </div>
                </form>
            </div>

        </x-card>
    </x-modal>

    {{-- Update Modal --}}
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="update_announcement">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <form wire:submit.prevent="update_announcement">
                    @csrf
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Update Announcement</h1>
                    <label for="title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Announcement Title</label>
                    <input wire:model.lazy="updateAnnArray.title" id="title" class="mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border  @error('title') {{'border-red-600'}} @enderror" placeholder="Enter Announcement Title" />
                    @error('title') <p wire:ignore class="mb-3 text-xs text-red-600 italic">{{ $message }}</p> @enderror
                    <label for="excerpt" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Short Decription</label>
                    <div class="mb-5 mt-2">
                        <input wire:model.lazy="updateAnnArray.excerpt" id="excerpt" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border @error('excerpt') {{'border-red-600'}} @enderror" placeholder="Enter Short Description" />
                        @error('excerpt') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                    </div>
                    <label for="content" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Content</label>
                    <div class="mb-5 mt-2" wire:ignore>
                        <textarea id="update_content" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 rounded border @error('content') {{'border-red-600'}} @enderror"></textarea>
                    </div>
                    @error('content') <p class="text-xs text-red-600 italic mb-3">{{ $message }}</p> @enderror
                    <label for="category" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Categories</label>
                    <div class="mb-5 mt-2">
                        <select wire:model="updateAnnArray.cat_id" class="text-gray-600 focus:border focus:border-indigo-700 font-normal w-1/2 h-10 pl-3 text-sm border-gray-300 rounded border @error('cat_id') {{'border-red-600'}} @enderror">
                            <option value="0">Choose Category</option>
                            @forelse ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->category}}</option>
                            @empty

                            @endforelse
                        </select>
                        @error('cat_id') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                    </div>
                    <div class="mt-2 mb-5">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="isUpdatedPublished" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900">Published</span>
                        </label>
                    </div>
                    <div class="flex items-center justify-start w-full">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="updateModalHandler()" aria-label="close modal" role="button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Create Announcement Modal
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

        // Update Announcement Modal
        let updateModal = document.getElementById("update_announcement");
        function updateModalHandler(val) {
            if (val) {
                fadeIn(updateModal);
            } else {
                fadeOut(updateModal);
            }
        }

        // CKEditor
        // Create Announcement
        const editor = CKEDITOR.replace('content');
        editor.on('blur', function(event){
            console.log(event.editor.getData())
            @this.set('insertAnnArray.content', event.editor.getData());

        })
        // Update Announcement
        const update_editor = CKEDITOR.replace('update_content');
        update_editor.on('change', function(event){
            console.log(update_editor.getData());
            @this.set('updateAnnArray.content', update_editor.getData());
        })

        window.addEventListener('update_content', event => {
            update_editor.setData(event.detail);
            @this.set('updateAnnArray.content', event.detail);
        });

        // Alerts
        window.addEventListener('SuccessfullyCreatedAnnouncement', event => {
            @this.showModal('create_modal', false);
            Swal.fire("Successfully Created Announcement", "You just have created an announcement", "success");
            editor.setData('');
        });
        window.addEventListener('UnsuccessfullyCreatedAnnouncement', event => {
            modalHandler(false);
            Swal.fire("Something Went Wrong!", "Please try again later.", "error");
        });
        window.addEventListener('SuccessfullyUpdatedAnnouncement', event => {
            updateModalHandler(false);
            Swal.fire("Successfully Created Announcement", "You just have created an announcement", "success");
            update_editor.setData('');
        });
        window.addEventListener('UnsuccessfullyUpdatedAnnouncement', event => {
            updateModalHandler(false);
            Swal.fire("Something Went Wrong!", "Please try again later.", "error");
        });

        // Delete
        function delete_confirm(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', id);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        }


    </script>



</div>
