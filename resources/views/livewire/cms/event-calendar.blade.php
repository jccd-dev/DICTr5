<div>
    <div class="flex flex-row mt-5 gap-4">
        {{-- CALENDAR --}}
        <div wire:ignore id="calendar" class="basis-7/12 text-sm"></div>
        {{-- EVENT --}}
        <div class="basis-5/12">
            <div class="flex flex-row-reverse">
                <div class="">
                    <button
                        type="button"
                        wire:click="showModal('create_event_modal', true)"
                        @click="modalActive = 1"
                        class="font-bold font-quicksand bg-custom-blue bg-opacity-10 hover:bg-opacity-20 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 -ml-2 text-dark-blue">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Add
                    </button>
                </div>
                <div class="mr-3">
                    <div class="relative">
                        <div class="absolute top-1/2 left-3 -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#474747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </div>
                        <input type="search" wire:model="search" id="search" class="w-56 h-11 drop-shadow-lg bg-[#00509D] border-0 bg-opacity-5 px-3 pl-10 py-2 rounded-md text-[#474747] text-sm" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="w-full bg-yellow-300 rounded-lg p-5 hidden lg:block ">
                <h1 class="font-bold text-2xl font-quicksand">{{date('F', strtotime($today['first_day_of_month']))}}, {{date('Y', strtotime($today['first_day_of_month']))}}</h1>
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
                    @forelse ($events as $event)
                        @php
                            date_default_timezone_set('Asia/Manila');
                            if(date('Y-m-d', strtotime($event['start'])) == date('Y-m-d', strtotime($event['end']))){
                                $is_single_day = true;
                            }else{
                                $is_single_day = false;
                            }
                            if(date('H:i:s', strtotime($event['start'])) == '00:00:00' && date('H:i:s', strtotime($event['end'])) == '23:59:00'){
                                $is_all_day = true;
                            }else{
                                $is_all_day = false;
                            }

                            if(date('Y-m-d H:i:s', strtotime($event['end'])) < date('Y-m-d H:i:s')){
                                $event_status = 0;
                            }elseif(date('Y-m-d H:i:s', strtotime($event['start'])) <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s', strtotime($event['end'])) >= date('Y-m-d H:i:s')){
                                $event_status = 1;
                            }else{
                                $event_status = 2;
                            }
                        @endphp
                        <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5 cursor-pointer" wire:click="showEvent('{{$event['id']}}')">
                            @if ($event_status == 0)
                                <div class="legend-icon rounded-full bg-[#C1121F] w-3 h-3"></div>
                            @elseif($event_status == 1)
                                <div class="legend-icon rounded-full bg-[#51B800] w-3 h-3"></div>
                            @else
                                <div class="legend-icon rounded-full bg-[#00296B] w-3 h-3"></div>
                            @endif
                            <div>
                                <h1 class="font-bold font-quicksand text-base mb-1">{{$event['title']}}</h1>
                                <p class="font-quicksand text-xs">{{($is_single_day) ? date('F d, Y', strtotime($event['start'])) : date('M d, Y', strtotime($event['start'])).' - '.date('M d, Y', strtotime($event['end'])) }}</p>
                                <p class="mt-0 font-quicksand text-xs">{{($is_all_day) ? 'All Day' : date('h:iA', strtotime($event['start'])).' - '.date('h:iA', strtotime($event['end']))}}</p>
                            </div>
                        </div>
                    @empty
                        <div class="">
                            <span>No Event</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Create Event Modal --}}
    <x-modal blur wire:model.defer="create_event_modal">
        <x-card title="Create Event">
            <div class="px-3" x-data="{toggleform:true}">
                <div class="flex flex-row-reverse">
                    <div>
                        <label class="relative inline-flex items-center mb-5 cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" @change="toggleform = !toggleform">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Exam Schedule</span>
                        </label>
                    </div>
                </div>
                <div x-show="toggleform">
                    <form wire:submit.prevent="create_event">
                        @csrf
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

                        <div class="mb-5 mt-2 flex flex-row gap-4">
                            <div>
                                <x-input label="Venue" placeholder="Enter Venue" wire:model.lazy="createEventArr.venue" class="w-full" style="width:300px" />
                                @error('venue') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <x-select
                                    label="Category"
                                    wire:model.defer="createEventArr.category"
                                    placeholder="Choose Category"
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
                                @error('category') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
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
                </div>
                {{--    EXAM SCHEDULE   --}}
                <div x-show="!toggleform">
                    <span class="text-xs font-semibold italic mb-2.5">NOTE: You cannot update nor delete the exam schedule in this page</span>
                    <form wire:submit.prevent="create_exam_schedule">
                        <div class="flex flex-row">
                            <div class="basis-2/3 m-1">
                                <x-input label="Exam Set" placeholder="Enter Exam Set" wire:model.defer="examSched.exam_set" />
                            </div>
                            <div class="basis-1/3 m-1">
                                <x-datetime-picker
                                    label="Exam Date"
                                    placeholder="Exam Date"
                                    without-time="true"
                                    wire:model.defer="examSched.date"
                                />
                            </div>
                        </div>
                        <br>
                        <span class="text-sm font-semibold">Time Duration</span> <br>
                        <div class="flex flex-row">
                            <div class="basis-1/2 m-1 mr-2">
                                <x-time-picker
                                    label="Start Time"
                                    placeholder="Choose starting time"
                                    wire:model.defer="examSched.start_time"
                                    interval="30"
                                />
                            </div>
                            <div class="basis-1/2 m-1 ml-2">
                                <x-time-picker
                                    label="End Time"
                                    placeholder="Choose end time"
                                    wire:model.defer="examSched.end_time"
                                    interval="30"
                                />
                            </div>
                        </div>
                        <br>
                        <label class="mt-4 text-sm font-semibold text-slate-700">Exam Venue</label>
                        <div x-data="{ open: false, selected: '' }" class="relative pt-1">
                            <input wire:model="examSched.venue"  @click="open = true" @click.away="open = false" class="w-full py-2 pl-3 pr-10 leading-tight border border-gray-300 text-sm font-semibold text-slate-700 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 @error('examSched.venue') {{'border-red-600'}} @enderror" type="text" placeholder="Select an Venue">
                            <div x-show="open" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg">
                                <ul class="py-1 overflow-auto">
                                    <li wire:click="selectVenue('Naga City Digital Innovation Hub')" @click="open = false" class="text-sm px-3 py-2 cursor-pointer hover:bg-gray-100">Naga City Digital Innovation Hub</li>
                                </ul>
                            </div>
                            @error('examSched.venue') <p wire:ignore class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <br>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
                    </form>
                </div>
            </div>

        </x-card>
    </x-modal>

    {{-- Update Event Modal --}}
    <x-modal blur wire:model.defer="update_event_modal">
        <x-card title="Update Event">
            <div class="px-3">
                <form wire:submit.prevent="update_event">
                    @csrf
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

                    <div class="mb-5 mt-2 flex flex-row gap-4">
                        <div>
                            <x-input label="Venue" placeholder="Enter Venue" wire:model.lazy="updateEventArr.venue" class="w-full" style="width:300px" />
                            @error('updateEventArr.venue') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <x-select
                                label="Category"
                                wire:model.defer="updateEventArr.category"
                                placeholder="Choose Category"
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
                            @error('category') <p class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
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
            </div>

        </x-card>
    </x-modal>

    {{-- View Event Modal --}}
    <x-modal blur wire:model.defer="show_event_modal">
        <x-card title="View Event">
            <div class="px-3">
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
                    <span class="font-semibold">Venue: {{$toShowEventDetail['venue']}}</span><br>
                    <span class="font-semibold">Category: {{$toShowEventDetail['category']}}</span>

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
                        <button class="flex justify-center bg-blue-500 text-white py-2 px-4 rounded" onclick="modalHandler('event_modal', false);" wire:click="update_event_data('{{$toShowEventDetail['id']}}')" wire:loading.class="bg-gray">
                            Update
                        </button>
                    </div>

                </div>
            </div>

        </x-card>
    </x-modal>

    <script>
        var calendar_counter = 0;
        // Initialize the calendar
        const allEvents = @json($calendar_events);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            editable:true,
            selectable:true,
            events: allEvents,
            eventBackgroundColor: '#00296B',
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                meridiem: 'short'
            },
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
                @this.set('create_event_modal', true)

                // Exam sched
                @this.set('examSched.date', start_date);
                // @this.set('examSched.start_time', start_time);
                // @this.set('examSched.end_time', end_time);

                // modalHandler('create_event_modal', true);
            },
            eventClick: function(data){
                if(data.event.id != 'examschedule'){
                    @this.showEvent(data.event.id);
                    modalHandler('event_modal', true);
                }else{
                    Swal.fire("ICT Proficiency Exam Schedule", "Go to Exam Schedule navbar to access details about the exam schedules.", "info");
                }
            },
            datesSet: function (info) {
                var startDate = info.start;
                var time = new Date(startDate.getTime() + 6 * 24 * 60 * 60 * 1000);
                var month = time.getMonth() + 1;
                var year = time.getFullYear();
                if(calendar_counter != 0){
                    const formatter = new Intl.NumberFormat('en-US', { minimumIntegerDigits: 2 });
                    @this.updateMonthAndYear(year+'-'+formatter.format(month)+'-01'+' 00:00:00');
                }
                calendar_counter++;
            },
            eventDrop: function(event, delta, revert){
                if(event.event.id != 'examschedule'){
                    var update_start = moment(event.event.start).format('YYYY-MM-DD HH:mm:ss');
                    var update_end = moment(event.event.end).format('YYYY-MM-DD HH:mm:ss');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reschedule it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.reschedule(event.event.id, update_start, update_end);
                            Swal.fire(
                                'Rescheduled!',
                                'The event was rescheduled.',
                                'success'
                            )
                        }else{
                            event.revert();
                        }
                    })
                }else{
                    Swal.fire("ICT Proficiency Exam Schedule", "You cannot update Exam Schedule here. Go to Exam Schedule navbar to update the schedule.", "info")
                    event.revert();
                }
            }
        });

        // Render the calendar
        calendar.render();

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
            @this.set('show_event_modal', false);
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
            @this.set('create_event_modal', false);
            if(event.detail['status']){
                // modalHandler('create_event_modal', false);
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

        window.addEventListener('ExamScheduleCreated', event => {
            @this.set('create_event_modal', false);
            if(event.detail){
                // modalHandler('create_event_modal', false);
                Swal.fire("Successfully Created Exam Schedule", "If you want to update or delete the exam schedule, access the Exam Schedule in navigation bar", "success");
                editor.setData('');
                // Rendering the new created event in the calendar
                var event = {
                    id: 'examschedule',
                    title: 'Exam Schedule',
                    start: event.detail.start_date,
                    end: event.detail.end_date,
                    color: "#989898"
                };
                // console.log(event);
                calendar.addEvent(event);
                calendar.render();
            }else{
                Swal.fire("Something Went Wrong!", "Please try again later.", "error");
            }
        });

        window.addEventListener('UpdatedEvent', event => {
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

        window.addEventListener('ErrorForExamSchedule', event => {
            Swal.fire("ICT Proficiency Exam Schedule", "Go to Exam Schedule navbar to access details about the exam schedules.", "info");
        });

    </script>
</div>
