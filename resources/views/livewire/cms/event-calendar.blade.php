<div>
    <div class="flex flex-row mt-5 gap-4">
        <div wire:ignore id="calendar" class="basis-7/12"></div>
        <div class="basis-5/12">
            <div class="flex flex-row-reverse">
                <div>
                    <button onclick="createEventModalHandler(true)">Add</button>
                </div>
            </div>
            {{$today['month']}}, {{$today['year']}}

        </div>
    </div>

    {{-- Create Event Modal --}}
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="create_event_modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <form wire:submit.prevent="create_event">
                    @csrf
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Create Event</h1>
                    <label for="title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Name</label>
                    <input wire:model.lazy="createEventArr.event_title" id="title" class="mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border  @error('event_title') {{'border-red-600'}} @enderror" placeholder="Enter Event Title" />
                    @error('event_title') <p wire:ignore class="text-xs text-red-600 italic">{{ $message }}</p> @enderror

                    <br>
                    <label class=" text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Date</label>
                    <div class="mb-5 mt-2 flex flex-row">
                        <div>
                            <input type="date" wire:model.lazy="createEventArr.start_date" id="create_start_date" class=" text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('start_date') {{'border-red-600'}} @enderror" />
                            @error('start_date') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="pt-2 mx-3">
                            -
                        </div>
                        <div>
                            <input type="date" wire:model.lazy="createEventArr.end_date" id="create_end_date" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('end_date') {{'border-red-600'}} @enderror" />
                            @error('end_date') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                    </div>
                 
                
                    <label for="event" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Description</label>
                    <div class="mb-5 mt-2" wire:ignore>
                        <textarea id="event_field" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 rounded border"></textarea>
                    </div>
                    @error('event') <p class="text-xs text-red-600 italic mb-3">{{ $message }}</p> @enderror

                    <div class="flex items-center justify-start w-full mt-3">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="createEventModalHandler()" aria-label="close modal" role="button">
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
        // Initialize the calendar
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            editable:true,
            selectable:true,
            headerToolbar: {
                start: 'prevYear,prev',
                center: 'title',
                end: 'next,nextYear',
            },
            initialView: 'dayGridMonth',
            select: function(date){
                var start_date = moment(date.start).format('YYYY-MM-DD');
                var end_date = moment(date.end).subtract(1, 'seconds').format('YYYY-MM-DD');
                @this.set('createEventArr.start_date', start_date);
                @this.set('createEventArr.end_date', end_date);
                createEventModalHandler(true);
            },
        });

        // Render the calendar
        calendar.render();

        // For Create Event Modal
        let modal = document.getElementById("create_event_modal");
        function createEventModalHandler(val) {
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

        // CKEditor
        // CKEditor
        // Create Announcement
        const editor = CKEDITOR.replace('event_field');
        editor.on('blur', function(event){
            console.log(event.editor.getData())
            @this.set('createEventArr.event', event.editor.getData());
            
        })
    </script>
</div>
