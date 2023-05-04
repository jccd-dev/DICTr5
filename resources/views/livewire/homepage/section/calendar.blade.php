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
            <div class="bg-white rounded-xl px-5 py-3 flex items-center gap-5 cursor-pointer" wire:click="showEvent({{$event['id']}}, {{$event['is_exam_sched']}})">
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
