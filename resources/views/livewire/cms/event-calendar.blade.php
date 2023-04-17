<div>
    <div class="flex flex-row mt-5 gap-4">
        {{-- CALENDAR --}}
        <div wire:ignore id="calendar" class="basis-7/12"></div>
        {{-- EVENT --}}
        <div class="basis-5/12">
            <div class="flex flex-row-reverse">
                <div>
                    <button onclick="modalHandler('create_event_modal', true)">Add</button>
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
            <div class="w-full bg-yellow-300 rounded-lg p-5 hidden lg:block ">
                <h1 class="font-bold text-2xl font-quicksand">{{$today['month']}}, {{$today['year']}}</h1>
                <div class="legends flex gap-5 mt-2  text-sm">
                    <div class="flex gap-2 items-center">
                        <div class="legend-icon rounded-full bg-[#51B800] w-2 h-2"></div>
                        <h4>Ongoing Events</h4>
                    </div>
                    <div class="flex gap-2 items-center">
                        <div class="legend-icon rounded-full bg-[#00296B] w-2 h-2"></div>
                        <h4>Upcoming Events</h4>
                    </div>
                    <div class="flex gap-2 items-center">
                        <div class="legend-icon rounded-full bg-[#C1121F] w-2 h-2"></div>
                        <h4>Past Events</h4>
                    </div>
                </div>
                <div class="flex flex-col mt-5 gap-3">
                    <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5">
                        <div class="legend-icon rounded-full bg-[#51B800] w-3 h-3"></div>
                        <div>
                            <h1 class="font-bold font-quicksand text-base mb-1">LGU Pili Tech4ED Center Launching</h1>
                            <p class="font-quicksand text-xs">March 28, 2023</p>
                            <p class="mt-0 font-quicksand text-xs">08:00AM - 5:00AM</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5">
                        <div class="legend-icon rounded-full bg-[#00296B] w-3 h-3"></div>
                        <div>
                            <h1 class="font-bold font-quicksand text-lg mb-1">LGU Pili Tech4ED Center Launching</h1>
                            <p class="font-quicksand text-xs">March 28, 2023</p>
                            <p class="mt-0 font-quicksand text-xs">08:00AM - 5:00AM</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5">
                        <div class="legend-icon rounded-full bg-[#C1121F] w-3 h-3"></div>
                        <div>
                            <h1 class="font-bold font-quicksand text-lg mb-1">LGU Pili Tech4ED Center Launching</h1>
                            <p class="font-quicksand text-xs">March 28, 2023</p>
                            <p class="mt-0 font-quicksand text-xs">08:00AM - 5:00AM</p>
                        </div>
                    </div>
                </div>
            </div>
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

                    <label class=" text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Time</label>
                    <div class="mb-5 mt-2 flex flex-row">
                        <div>
                            <input type="time" wire:model.lazy="createEventArr.start_time" id="create_start_time" class=" text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('start_time') {{'border-red-600'}} @enderror" />
                            @error('start_time') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="pt-2 mx-3">
                            -
                        </div>
                        <div>
                            <input type="time" wire:model.lazy="createEventArr.end_time" id="create_end_time" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('end_time') {{'border-red-600'}} @enderror" />
                            @error('end_time') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
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
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler('create_event_modal', false)" aria-label="close modal" role="button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Update Event Modal --}}
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="update_event_modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <form wire:submit.prevent="update_event">
                    @csrf
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Update Event</h1>
                    <label for="title" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Name</label>
                    <input wire:model.lazy="updateEventArr.event_title" id="title" class="mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border  @error('event_title') {{'border-red-600'}} @enderror" placeholder="Enter Event Title" />
                    @error('event_title') <p wire:ignore class="text-xs text-red-600 italic">{{ $message }}</p> @enderror

                    <br>
                    <label class=" text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Date</label>
                    <div class="mb-5 mt-2 flex flex-row">
                        <div>
                            <input type="date" wire:model.lazy="updateEventArr.start_date" id="create_start_date" class=" text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('start_date') {{'border-red-600'}} @enderror" />
                            @error('start_date') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="pt-2 mx-3">
                            -
                        </div>
                        <div>
                            <input type="date" wire:model.lazy="updateEventArr.end_date" id="create_end_date" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('end_date') {{'border-red-600'}} @enderror" />
                            @error('end_date') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <label class=" text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Time</label>
                    <div class="mb-5 mt-2 flex flex-row">
                        <div>
                            <input type="time" wire:model.lazy="updateEventArr.start_time" id="create_start_time" class=" text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('start_time') {{'border-red-600'}} @enderror" />
                            @error('start_time') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="pt-2 mx-3">
                            -
                        </div>
                        <div>
                            <input type="time" wire:model.lazy="updateEventArr.end_time" id="create_end_time" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal h-10 pr-3 flex items-center pl-3 text-sm border-gray-300 rounded border @error('end_time') {{'border-red-600'}} @enderror" />
                            @error('end_time') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                    </div>
                 
                
                    <label for="event" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Event Description</label>
                    <div class="mb-5 mt-2" wire:ignore>
                        <textarea id="update_event_field" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 rounded border"></textarea>
                    </div>
                    @error('event') <p class="text-xs text-red-600 italic mb-3">{{ $message }}</p> @enderror

                    <div class="flex items-center justify-start w-full mt-3">
                        <button type="submit" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    </div>
                </form>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler('update_event_modal', false)" aria-label="close modal" role="button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- View Event Modal --}}
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="event_modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div>
                    <h2 class="font-bold text-xl">{{$toShowEventDetail['event_title']}}</h2>
                    <span class="text-sm">{{
                        ($toShowEventDetail['is_single_day']) ? 
                        date("F d, Y", strtotime($toShowEventDetail['start_date'])) : 
                        date("M d, Y", strtotime($toShowEventDetail['start_date'])).' - '.date("M d, Y", strtotime($toShowEventDetail['end_date']))
                    }}</span><br>
                    <span class="text-sm">{{
                        ($toShowEventDetail['is_allDay']) ? 
                        'All Day' : 
                        date("h:iA", strtotime($toShowEventDetail['start_date'])).' - '.date("h:iA", strtotime($toShowEventDetail['end_date']))
                    }}</span><br>

                    <hr>

                    <div class="text-base p-5">
                        @if($toShowEventDetail['event'])
                            @php echo $toShowEventDetail['event'] @endphp
                        @else
                            <div class="w-full text-center">
                                <span class="italic font-bold"> NO CONTENT</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-center gap-3">
                        <button class="flex justify-center bg-red-700 text-white py-2 px-4 rounded" onclick="delete_event({{$toShowEventDetail['id']}}, '{{$toShowEventDetail['event_title']}}')">
                            Delete
                        </button>
                        <button class="flex justify-center bg-blue-500 text-white py-2 px-4 rounded" onclick="modalHandler('event_modal', false); modalHandler('update_event_modal', true);" wire:click="update_event_data('{{$toShowEventDetail['id']}}')">
                            Update
                        </button>
                    </div>
                    
                </div>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler('event_modal', false)" aria-label="close modal" role="button">
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
        const allEvents = @json($events);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            editable:true,
            selectable:true,
            events: allEvents,
            displayEventTime: false,
            headerToolbar: {
                start: 'prevYear,prev',
                center: 'title',
                end: 'next,nextYear dayGridMonth,timeGridWeek,dayGridDay',
            },
            initialView: 'dayGridMonth',
            select: function(date){
                var start_date = moment(date.start).format('YYYY-MM-DD');
                var start_time = moment(date.start).format('HH:mm:ss');
                if(date.allDay){
                    var end_date = moment(date.end).subtract(1, 'minutes').format('YYYY-MM-DD');
                    var end_time = moment(date.end).subtract(1, 'minutes').format('HH:mm:ss');
                }else{
                    var end_date = moment(date.end).format('YYYY-MM-DD');
                    var end_time = moment(date.end).format('HH:mm:ss');
                }
                @this.set('createEventArr.start_date', start_date);
                @this.set('createEventArr.end_date', end_date);
                @this.set('createEventArr.start_time', start_time);
                @this.set('createEventArr.end_time', end_time);
                modalHandler('create_event_modal', true);
            },
            eventClick: function(data){
                @this.showEvent(data.event.id);
                modalHandler('event_modal', true);
            },
            datesSet: function (info) {
                var startDate = info.start;
                var time = new Date(startDate.getTime() + 7 * 24 * 60 * 60 * 1000);
                var month = time.getMonth();
                var year = time.getFullYear();
                updateMonthAndYear(month, year);
            },
        });

        // Render the calendar
        calendar.render();

        function updateMonthAndYear(month, year){
            console.log(month);
            console.log(year);
        }

        // For Modal
        function modalHandler(modal_id, val) {
            modal = document.getElementById(modal_id);
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
        // Create Event
        const editor = CKEDITOR.replace('event_field');
        editor.on('change', function(event){
            console.log(event.editor.getData())
            @this.set('createEventArr.event', event.editor.getData());

        });

        // Update Event
        const update_editor = CKEDITOR.replace('update_event_field');
        update_editor.on('change', function(event){
            console.log(event.editor.getData())
            @this.set('updateEventArr.event', event.editor.getData());

        });

        // For updating content of CKEditor
        window.addEventListener('update_event_content', event => {
            update_editor.setData(event.detail);
            @this.set('updateEventArr.event', event.detail);
        });

        // Delete Event
        function delete_event(id, name){
            modalHandler('event_modal', false);
            Swal.fire({
            title: 'Are you sure you want to delete '+name+'?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var deleted = @this.deleteEvent(id);
                    if(deleted){
                        var eventToRemove = calendar.getEventById(id);
                        // Remove the event from the calendar
                        eventToRemove.remove();
                        // Alert
                        Swal.fire(
                        'Deleted!',
                        '\''+name+'\' has been deleted.',
                        'success'
                        )
                    }else{
                        Swal.fire("Something Went Wrong!", "Please try again later.", "error");
                    }
                }
            })
        }

        // Alerts
        window.addEventListener('EventCreated', event => {
            if(event.detail['status']){
                modalHandler('create_event_modal', false);
                Swal.fire("Successfully Created Event", "You just have created an event", "success");
                editor.setData('');
                // Rendering the new created event in the calendar
                var event = {
                    id: event.detail['event']['id'],
                    title: event.detail['event']['title'],
                    start: event.detail['event']['start'],
                    end: event.detail['event']['end'],
                };
                calendar.addEvent(event);
                calendar.render();
            }else{
                modalHandler('create_event_modal', false);
                Swal.fire("Something Went Wrong!", "Please try again later.", "error");
            }
        });

        window.addEventListener('UpdatedEvent', event => {
            modalHandler('update_event_modal', false);
            if(event.detail['status']){
                // Replacing the old event to the updated event in the calendar
                var to_update_event = calendar.getEventById(event.detail['event']['id']);
                to_update_event.setProp('title', event.detail['event']['event_title']);
                to_update_event.setStart(event.detail['event']['start']);
                to_update_event.setEnd(event.detail['event']['end']);
                
                Swal.fire("Successfully Updated Event", "You just have updated an event.", "success");
            }else{
                Swal.fire("Something Went Wrong!", "Please try again later.", "error");
            }
        });

    </script>
</div>
