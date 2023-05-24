<div class="font-quicksand">
    <x-notifications />
    <div class="bg-white rounded-xl px-10 py-8">
        <div class="flex flex-row-reverse">
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
                <button wire:click="changeContent(1)" class="{{($content == 1) ? 'border-indigo-500 text-gray-900 font-semibold': 'border-transparent text-gray-500'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                  Feedbacks
                </button>

                <button wire:click="changeContent(2)" class="{{($content == 2) ? 'border-indigo-500 text-gray-900 font-semibold': 'border-transparent text-gray-500'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                  Tech4Ed
                </button>

                <button wire:click="changeContent(3)" class="{{($content == 3) ? 'border-indigo-500 text-gray-900 font-semibold': 'border-transparent text-gray-500'}} hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                  Sent Emails
                </button>
              </nav>
            </div>
          </div>
          {{-- Content --}}
          {{-- Loader --}}
          <div class="w-full text-center p-52" wire:loading wire:target="changeContent">
              <div role="status">
                  <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                      <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                  </svg>
                  <span class="sr-only">Loading...</span>
              </div>
          </div>
          <div class="pt-3" wire:loading.remove wire:target="changeContent">
            @if ($content == 1)
                <div class="flex flex-row gap-2">
                    <div class="basis-2/6">
                        <div class="border-2 rounded-xl mb-4">
                            @php
                                $feedback_counter = 0;
                                $last_feedback = false;
                            @endphp
                            @forelse ($feedbacks as $fb)
                                @php
                                    $feedback_counter++;
                                    if($feedback_counter == $feedbacks->count())
                                        $last_feedback = true;
                                @endphp
                                <div class="flex flex-row {{($feedback_counter == 1) ? 'rounded-t-xl' : ''}}  {{(!$last_feedback) ? 'border-b-2' : 'rounded-b-xl'}} border-gray-300 {{($onReadFeedback == $fb->id) ? ' bg-yellow-300' : ''}} py-2 px-4">
                                   <div class="basis-11/12 cursor-pointer" wire:click="openFeedback({{$fb->id}})">
                                        <p class="leading-3">
                                            <span class="text-lg {{(!$fb->is_read) ? 'font-bold' : '' }} {{($onReadFeedback == $fb->id) ? 'font-bold' : ''}}">{{$fb->name}}</span>
                                            <br>
                                            <span class="text-sm {{(!$fb->is_read) ? 'font-semibold' : '' }}">{{$fb->email}} | {{$fb->cp_number}}</span>
                                            <br>
                                            <span class="text-xs {{(!$fb->is_read) ? 'font-semibold' : '' }}">{{date('m/d/Y h:i A', strtotime($fb->timestamp))}}</span>
                                        </p>
                                   </div>
                                    <div wire:click="prepare_to_delete({{$fb->id}})" class="basis-1/12 flex justify-end">
                                        <svg fill="none" class="w-5 text-right cursor-pointer text-red-700" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </div>
                                </div>
                            @empty
                                <div>
                                    No Found Feedback
                                </div>
                            @endforelse
                        </div>
                        {{ $feedbacks->links() }}
                    </div>
                    {{-- Loading --}}
                    <div class="basis-4/6 border-2 rounded-xl p-5">
                        <div class="w-full text-center" wire:loading wire:target="openFeedback">
                            <div role="status">
                                <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div wire:loading.remove wire:target="openFeedback">
                            <h2 class="font-bold">Message: </h2>
                            {{$feedbackContent}}
                        </div>
                    </div>
                </div>
            @elseif($content == 2)


                  <div class="relative overflow-x-auto">
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-6 py-3">
                                  Name
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Email
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Cellphone Number
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Organization
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Tech4Ed Course
                              </th>
                              <th scope="col" class="px-6 py-3">
                                  Action
                              </th>
                          </tr>
                          </thead>
                          <tbody>
                          @forelse ($tech4ed_requests as $tech4ed)
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      {{$tech4ed->name}}
                                  </th>
                                  <td class="px-6 py-4">
                                      {{$tech4ed->email}}
                                  </td>
                                  <td class="px-6 py-4">
                                      {{$tech4ed->cp_number}}
                                  </td>
                                  <td class="px-6 py-4">
                                      {{$tech4ed->organization}}
                                  </td>
                                  <td class="px-6 py-4">
                                      {{$tech4ed->tech4ed_course_training}}
                                  </td>
                                  <td class="px-6 py-4">
                                      <div wire:click="prepare_to_delete({{$tech4ed->id}})">
                                          <svg fill="none" class="w-5 text-right cursor-pointer text-red-700" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                          </svg>
                                      </div>
                                  </td>
                              </tr>
                          @empty
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <th colspan="6" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      No Available Data
                                  </th>
                              </tr>
                          @endforelse
                          </tbody>
                          {{ $tech4ed_requests->links() }}
                      </table>
                  </div>
            @else
                This is
            @endif
          </div>
    </div>

    {{-- Delete Modal for Feedback --}}
    <x-modal wire:model.defer="feedback_modal" blur="true" align="center" max-width="sm">
        <x-card title="Delete Confirmation">
            <p class="text-gray-600">
                Are you sure you want to delete the feedback?
            </p>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button secondary label="Cancel" x-on:click="close" />
                    <x-button wire:click="delete_feedback" red label="Yes, delete it!" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
