<div class="pt-5">
    <div class="flex flex-row">
        <div class="basis-1/2">
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
            </div>
        </div>
        <div class="basis-1/2">
            <div class="flex flex-row-reverse">
                <div class="p-2">
                    <button onclick="modalHandler('create_schedule_modal', true)" class="flex items-center gap-2 px-4 py-1 bg-[#00509D] bg-opacity-5 hover:bg-[#00509D] rounded">
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

    {{-- TABLE --}}
    <table class="table table-light w-full">
        <tbody>
            <tr class="font-bold border-b-2 border-slate-900">
                <td>Date</td>
                <td>Time</td>
                <td>Exam Set</td>
                <td>Venue</td>
                <td>Status</td>
                <td class="text-center">Action</td>
            </tr>
        </tbody>
        @forelse ($schedules as $sched)
            <tr>
                <td>{{date('F d, Y', strtotime($sched->start_date))}}</td>
                <td>{{date('h:i A', strtotime($sched->start_date)).' - '.date('h:i A', strtotime($sched->end_date))}}</td>
                <td>{{$sched->exam_set}}</td>
                <td>{{$sched->venue}} </td>
                <td>
                    @if($sched->end_date < date("Y-m-d H:i:s"))
                        <div class="text-xs font-semibold p-1 bg-green-200 w-12 text-center rounded">Done</div>
                    @else
                        <div class="text-xs font-semibold p-1 bg-secondary-300 w-14 text-center rounded">Pending</div>
                    @endif
                </td>
                <td class="text-center">
                    <button class="px-2 py-1 m-1 mr-0 bg-[#00509D] bg-opacity-40 rounded-md" wire:click="update_field({{$sched->id}})" onclick="update_schedule({{$sched->id}})">Edit</button>
                    <button class="px-2 py-1 m-1 ml-0 bg-[#C1121F] bg-opacity-40 rounded-md" onclick="delete_schedule({{$sched->id}})">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No Record Found</td>
            </tr>
        @endforelse
    </table>

    <br>
    {{--  TRIAL  --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Google Pixel Phone
                </th>
                <td class="px-6 py-4">
                    Gray
                </td>
                <td class="px-6 py-4">
                    Phone
                </td>
                <td class="px-6 py-4">
                    $799
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple Watch 5
                </th>
                <td class="px-6 py-4">
                    Red
                </td>
                <td class="px-6 py-4">
                    Wearables
                </td>
                <td class="px-6 py-4">
                    $999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>


    {{-- Create Exam Schedule --}}
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="create_schedule_modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div>
                    <h3 class="text-xl font-bold">Create Exam Schedule</h3>
                    <hr class="border my-2">
                    <form wire:submit.prevent="create_event_schedule">
                        @csrf
                        <x-input label="Exam Set" placeholder="Enter set of exam" wire:model.defer="exam_set" />
                        <br>
                        <x-datetime-picker
                            without-timezone
                            label="Exam Schedule"
                            placeholder="Examination Schedule"
                            parse-format="YYYY-MM-DD"
                            wire:model.defer="sched_date"
                            interval=30
                            without-time="true"
                        />
                        <br>
                        <div class="flex flex-row">
                            <div class="basis-5/12">
                                <x-time-picker
                                    label="Start Time"
                                    placeholder="12:00 AM"
                                    parse-format="HH:mm:00"
                                    wire:model.defer="sched_start_time"
                                    interval=30
                                />
                            </div>
                            <div class="basis-2/12 text-center pt-6">
                                -
                            </div>
                            <div class="basis-5/12">
                                <x-time-picker
                                    label="End Time"
                                    placeholder="12:00 AM"
                                    parse-format="HH:mm:00"
                                    wire:model.defer="sched_end_time"
                                    interval=30
                                />
                            </div>
                        </div>
                        <br>
                        <label class="mt-4 text-sm font-semibold text-slate-700">Exam Venue</label>
                        <div x-data="{ open: false, selected: '' }" class="relative pt-1">
                            <input wire:model="venue"  @click="open = true" @click.away="open = false" class="w-full py-2 pl-3 pr-10 leading-tight border border-gray-300 text-sm font-semibold text-slate-700 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 @error('venue') {{'border-red-600'}} @enderror" type="text" placeholder="Select an Venue">
                            <div x-show="open" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg">
                                <ul class="py-1 overflow-auto">
                                    <li wire:click="selectVenue('Naga City Digital Innovation Hub')" @click="open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100">Naga City Digital Innovation Hub</li>
                                </ul>
                            </div>
                            @error('venue') <p wire:ignore class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mt-3 w-full flex justify-center">
                            <button type="submit" class="p-2 bg-yellow-300 rounded text-sm font-semibold">Save</button>
                        </div>
                    </form>
                </div>
                <button onclick="modalHandler('create_schedule_modal', false)" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" aria-label="close modal" role="button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Update Exam Schedule --}}
    <div wire:ignore.self class="py-12 hidden bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="update_schedule_modal">
        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-2xl">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                <div>
                    <h3 class="text-xl font-bold">Update Exam Schedule</h3>
                    <hr class="border my-2">
                    <form wire:submit.prevent="update_event_schedule">
                        @csrf
                        <x-input label="Exam Set" placeholder="Enter set of exam" wire:model.defer="update_exam_set" />
                        <br>
                        <x-datetime-picker
                            without-timezone
                            label="Exam Schedule"
                            placeholder="Examination Schedule"
                            parse-format="YYYY-MM-DD"
                            wire:model.defer="update_sched_date"
                            interval=30
                            without-time="true"
                        />
                        <br>
                        <div class="flex flex-row">
                            <div class="basis-5/12">
                                <x-time-picker
                                    label="Start Time"
                                    placeholder="12:00 AM"
                                    parse-format="HH:mm:00"
                                    wire:model.defer="update_sched_start_time"
                                    interval=30
                                />
                            </div>
                            <div class="basis-2/12 text-center pt-6">
                                -
                            </div>
                            <div class="basis-5/12">
                                <x-time-picker
                                    label="End Time"
                                    placeholder="12:00 AM"
                                    parse-format="HH:mm:00"
                                    wire:model.defer="update_sched_end_time"
                                    interval=30
                                />
                            </div>
                        </div>
                        <br>
                        <label class="mt-4 text-sm font-semibold text-slate-700">Exam Venue</label>
                        <div x-data="{ open: false, selected: '' }" class="relative pt-1">
                            <input wire:model="update_venue"  @click="open = true" @click.away="open = false" class="w-full py-2 pl-3 pr-10 leading-tight border border-gray-300 text-sm font-semibold text-slate-700 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 @error('update_venue') {{'border-red-600'}} @enderror" type="text" placeholder="Select an Venue">
                            <div x-show="open" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg">
                                <ul class="py-1 overflow-auto">
                                    <li wire:click="selectUpdatedVenue('Naga City Digital Innovation Hub')" @click="open = false" class="px-3 py-2 cursor-pointer hover:bg-gray-100">Naga City Digital Innovation Hub</li>
                                </ul>
                            </div>
                            @error('update_venue') <p wire:ignore class="text-xs text-red-600 italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mt-3 w-full flex justify-center">
                            <button type="submit" class="p-2 bg-yellow-300 rounded text-sm font-semibold">Update</button>
                        </div>
                    </form>
                </div>
                <button onclick="modalHandler('update_schedule_modal', false)" class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" aria-label="close modal" role="button">
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

        function delete_schedule(id){
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
                        var status = @this.delete_exam_schedule(id);
                        if(status){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Something went wrong',
                                'Please try again later',
                                'error'
                            )
                        }
                    }
            })
        }

        function update_schedule(id){
            modalHandler('update_schedule_modal', true);
        }

        // Alerts
        window.addEventListener('ExamScheduleCreated', event => {
            modalHandler('create_schedule_modal', false)
            if(event.detail){
                Swal.fire(
                    'Exam Scheduled!',
                    'You have successfully scheduled the exam',
                    'success'
                )
            }else{
                Swal.fire(
                    'Something went wrong',
                    'Please try again later',
                    'error'
                )
            }
        });

        window.addEventListener('Error', event => {
            Swal.fire(
                'Something went wrong',
                ''+event.detail,
                'error'
            )
        });
        window.addEventListener('UpdateSchedule', event => {
            modalHandler('update_schedule_modal', false)
            if(event.detail){
                Swal.fire(
                    'Exam Schedule Updated!',
                    'You have successfully updated the exam schedule',
                    'success'
                )
            }else{
                Swal.fire(
                    'Something went wrong',
                    'Please try again later.',
                    'error'
                )
            }
        });




    </script>

</div>
