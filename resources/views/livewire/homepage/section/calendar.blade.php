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
                if(date('Y-m-d H:i:s', strtotime($event->end_date)) < date('Y-m-d H:i:s')){
                    $status = 0;
                }elseif(date('Y-m-d H:i:s', strtotime($event->start_date)) <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s', strtotime($event->end_date)) >= date('Y-m-d H:i:s')){
                    $status = 1;
                }else{
                    $status = 2;
                }
            @endphp
            <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5">
                @if ($status == 0)
                    <div class="legend-icon rounded-full bg-[#C1121F] w-3 h-3"></div>
                @elseif($status == 1)
                    <div class="legend-icon rounded-full bg-[#51B800] w-3 h-3"></div>
                @else
                    <div class="legend-icon rounded-full bg-[#00296B] w-3 h-3"></div>
                @endif
                <div>
                    <h1 class="font-bold font-quicksand text-lg mb-1 cursor-pointer" wire:click="showEvent({{$event->id}})" data-modal-target="event_modal" data-modal-toggle="event_modal">{{$event->event_title}}</h1>
                    <p class="font-quicksand text-sm">
                        @if(date('Y-m-d', strtotime($event->start_date)) == date('Y-m-d', strtotime($event->end_date)))
                            {{date("F d, Y", strtotime($event->start_date))}}
                        @else
                            {{date("M d, Y", strtotime($event->start_date)).' - '.date("M d, Y", strtotime($event->end_date))}}
                        @endif
                    </p>
                    <p class="mt-0 font-quicksand text-sm">
                        @if(date('H:i:s', strtotime($event->start_date)) == '00:00:00' && date('H:i:s', strtotime($event->end_date)) == '23:59:00')
                            All Day
                        @else
                            {{date("h:iA", strtotime($event->start_date)).' - '.date("h:iA", strtotime($event->end_date))}}
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
    <div wire:ignore.self id="event_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Event Detail
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="event_modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
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

                </div>
            </div>
        </div>
    </div>

</div>
