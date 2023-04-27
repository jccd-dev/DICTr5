<div>
    <div class="flex flex-row-reverse ...">
        <div class="p-2 mr-3">
            <div class="relative">
                <div class="absolute top-1/2 left-3 -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#474747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input type="search" wire:model="search" id="search" class="w-56 drop-shadow-lg bg-[#00509D] bg-opacity-5 px-3 pl-10 py-2 rounded-md text-[#474747] text-sm" placeholder="Search">
            </div>
        </div>
    </div>
    <div class="relative w-full">
        <div class="border-b border-gray-200">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <button wire:click="changeContent(1)" class="{{($content == 1) ? 'border-indigo-500': 'border-transparent'}} text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
              Feedbacks
            </button>
      
            <button wire:click="changeContent(2)" class="{{($content == 2) ? 'border-indigo-500': 'border-transparent'}} text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
              Sent Emails
            </button>
          </nav>
        </div>
      </div>
      {{-- Content --}}
      <div class="pt-3">
        @if ($content == 1)
            <div class="flex flex-row gap-3">
                <div class="basis-2/6">
                    @forelse ($feedbacks as $fb)
                        <div wire:click="openFeedback({{$fb->id}})" class="border border-2 {{(!$fb->is_read) ? 'bg-yellow-300' : 'bg-yellow-100 border' }} {{($onReadFeedback == $fb->id) ? ' border-blue-700' : ''}} py-2 px-4 cursor-pointer rounded mb-2 ">
                            <p class="leading-3">
                                <span class="text-lg font-bold">{{$fb->name}}</span>
                                <br>
                                <span class="text-sm font-semibold">{{$fb->email}} | {{$fb->cp_number}}</span>
                                <br>
                                <span class="text-xs font-semibold">{{date('m/d/Y h:i A', strtotime($fb->timestamp))}}</span>
                            </p>
                        </div>
                    @empty
                        <div>
                            No Found Feedback
                        </div>
                    @endforelse
                    {{ $feedbacks->links() }}
                </div>
                <div class="basis-4/6">
                    {{$feedbackContent}}
                </div>
            </div>
        @else
            This is
        @endif
      </div>
</div>
