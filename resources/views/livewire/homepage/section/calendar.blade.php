<div class="flex justify-center gap-10 flex-col lg:flex-row">

    <div class="hidden md:flex items-center justify-center" id = "calendar-section" x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
        <div class="max-w-lg w-full shadow-lg">
            <div class="md:p-8 p-5 dark:bg-gray-800 bg-white rounded-t">
                <div class="px-4 flex items-center justify-between">
                <span  tabindex="0" class="focus:outline-none  text-xl font-bold dark:text-gray-100 text-gray-800">
                    <span x-text="MONTH_NAMES[month]"></span>
                    <span x-text="year"></span>
                </span>
                    <div class="flex items-center">
                        <button id="prev_but" aria-label="calendar backward"
                                :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                :disabled="month == 0 ? true : false"
                                @click="month--; getNoOfDays();"
                                class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg>
                        </button>
                        <button id="next_but" aria-label="calendar forward"
                                :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                :disabled="month == 11 ? true : false"
                                @click="() => {month++; getNoOfDays()}"
                                class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler  icon-tabler-chevron-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </button>

                    </div>
                </div>
                <div class="flex items-center justify-between pt-12">
                    <div class="-mx-1 -mb-1">
                        <div class="flex flex-wrap">
                            <template x-for="(day, index) in DAYS" :key="index">
                                <div style="width: 14.26%" class="px-2 py-2">
                                    <div
                                        x-text="day"
                                        class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                </div>
                            </template>
                        </div>
                        <div class="flex flex-wrap" x-data="{ isToday: isToday }" >
                            <template x-for="blankday in blankdays">
                                <div
                                    style="width: 14.28%; height: 70px"
                                    class="text-center px-4 pt-2"
                                ></div>
                            </template>
                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                <div style="width: 14.28%; height: 70px" class="flex justify-center items-center">
                                    <div x-show="isToday(date)" class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                        <a role="link" x-text="date" tabindex="0" class="focus:outline-none select-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full"></a>
                                    </div>
                                    <div x-show="!isToday(date)" class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                        <p class="text-base text-gray-500 dark:text-gray-100 font-medium hover:bg-slate-200 w-8 h-8 rounded-full flex justify-center items-center select-none" x-text="date"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-fit mx-5 md:w-[35rem] bg-yellow-300 rounded-xl p-5 md:p-10 block">
        <h1 class="font-bold text-2xl font-quicksand">{{$todayMonth.' '.$todayYear}} Highlight Activities</h1>
        <div class="legends flex gap-5 mt-2">
            <div class="flex gap-2 items-center">
                <div class="legend-icon rounded-full bg-[#51B800] w-3 h-3"></div>
                <h4>Ongoing Events</h4>
            </div>
            <div class="flex gap-2 items-center">
                <div class="legend-icon rounded-full bg-[#00296B] w-3 h-3"></div>
                <h4>Upcoming Events</h4>
            </div>
            <div class="flex gap-2 items-center">
                <div class="legend-icon rounded-full bg-[#C1121F] w-3 h-3"></div>
                <h4>Past Events</h4>
            </div>
        </div>
        <div class="flex flex-col mt-5 gap-3 overflow-y-auto h-96 pr-5">
            @forelse ($events as $event)
                @php
                    if(date('Y-m-d H:i:s', strtotime($event['end'])) < date('Y-m-d H:i:s')){
                        $status = 0;
                    }elseif(date('Y-m-d H:i:s', strtotime($event['start'])) <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s', strtotime($event['end'])) >= date('Y-m-d H:i:s')){
                        $status = 1;
                    }else{
                        $status = 2;
                    }
                @endphp
                <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5 cursor-pointer" wire:click="showEvent({{$event['id']}}, {{($event['is_exam_sched']) ? 1 : 0}})" >
                    @if ($status == 0)
                        <div class="legend-icon rounded-full bg-[#C1121F] w-3 h-3"></div>
                    @elseif($status == 1)
                        <div class="legend-icon rounded-full bg-[#51B800] w-3 h-3"></div>
                    @else
                        <div class="legend-icon rounded-full bg-[#00296B] w-3 h-3"></div>
                    @endif
                    <div>
                        <h1 class="font-bold font-quicksand text-lg mb-1 ">{{$event['title']}}</h1>
                        <p class="font-quicksand text-sm">
                            @if(date('Y-m-d', strtotime($event['start'])) == date('Y-m-d', strtotime($event['end'])))
                                {{date("F d, Y", strtotime($event['start']))}}
                            @else
                                {{date("M d, Y", strtotime($event['start'])).' - '.date("M d, Y", strtotime($event['end']))}}
                            @endif
                        </p>
                        <p class="mt-0 font-quicksand text-sm">
                            @if(date('H:i:s', strtotime($event['start'])) == '00:00:00' && date('H:i:s', strtotime($event['end'])) == '23:59:00')
                                All Day
                            @else
                                {{date("h:iA", strtotime($event['start'])).' - '.date("h:iA", strtotime($event['end']))}}
                            @endif
                        </p>
                    </div>
                </div>
            @empty
                <div>
                    No available event this month
                </div>
            @endforelse

        </div>

        <!-- Event modal -->
        <x-modal blur align="center" wire:model.defer="event_modal">
            <x-card title="Event Detail">
                {{-- Modal Body --}}
                <div class="p-5">
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
                    @if(!$toShowEventDetail['is_exam_schedule'])
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
                    @endif
                </div>
            </x-card>
        </x-modal>
    </div>

    <script>
        const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function app() {
            return {
                month: '',
                year: '',
                no_of_days: [],
                blankdays: [1,2,3,4,5,6],
                days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                initDate() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    // console.log(d, today)

                    return today.toDateString() === d.toDateString() ? true : false;
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for ( var i=1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }

                    let daysArray = [];
                    for ( var i=1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }

                    this.blankdays = blankdaysArray;
                    this.no_of_days = daysArray;
                },
            }
        }

        var currentDate = new Date();  // Create a new Date object
        var numberOfMonthsToAdd = 0;  // Number of months to add

        // Current Date
        // Add the specified number of months to the current date
        var futureDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + numberOfMonthsToAdd, currentDate.getDate());

        // Display the future date
        var month = futureDate.toLocaleString('default', { month: 'long' });  // Get the month name
        var day = futureDate.getDate();  // Get the day
        var year = futureDate.getFullYear();  // Get the year
        var formattedDate = month + ' ' + day + ', ' + year;

        console.log(formattedDate);
        console.log(currentDate.getDate());

        var intMonth = currentDate.getMonth();

        $("#next_but").click(function(){
            if(intMonth == 12){
                intMonth = 1;
            }else{
                intMonth += 1;
            }
            // Add the specified number of months to the current date
            futureDate = new Date(currentDate.getFullYear(), intMonth, 1);

            // Display the future date
            month = futureDate.toLocaleString('default', { month: 'long' });  // Get the month name
            day = futureDate.getDate();  // Get the day
            year = futureDate.getFullYear();  // Get the year
            formattedDate = month + ' ' + day + ', ' + year;
            console.log(formattedDate);
            @this.change_events(formattedDate);
        });

        $("#prev_but").click(function(){
            if(intMonth == 1){
                intMonth = 12;
            }else{
                intMonth -= 1;
            }
            // Minus the specified number of months to the current date
            futureDate = new Date(currentDate.getFullYear(), intMonth, 1);

            // Display the future date
            month = futureDate.toLocaleString('default', { month: 'long' });  // Get the month name
            day = futureDate.getDate();  // Get the day
            year = futureDate.getFullYear();  // Get the year
            formattedDate = month + ' ' + day + ', ' + year;
            @this.change_events(formattedDate);
        });
    </script>
</div>
