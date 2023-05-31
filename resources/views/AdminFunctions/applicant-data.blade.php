@extends('layouts.layout')

@section('content')
<div class="relative" x-data=""
     x-init="">
     @if(session()->has('warning') || session()->has('erorr') || session()->has('success'))
        <div id="dismiss-alert-session" wire:ignore class="w-full text-white
            {{ session()->has('success') ? 'bg-emerald-500' : '' }}
            {{ session()->has('warning') ? 'bg-orange-500' : '' }}
            {{ session()->has('error') ? 'bg-red-500' : '' }}
            absolute -top-10 right-0 z-[1000]">
            <div class="container relative flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                        </path>
                    </svg>
                    <p class="mx-3" id="message-alert">
                        {{ session()->has('success') ? session()->get('success') : '' }}
                        {{ session()->has('error') ? session()->get('error') : '' }}
                        {{ session()->has('warning') ? session()->get('warning') : '' }}
                    </p>
                </div>

                <button id="closeAlertBtn" class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div id="dismiss-alert" class="w-full hidden text-white bg-emerald-400 absolute -top-10 right-0 z-10">
        <div class="container relative flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center">
                <svg viewBox="0 0 40 40" id="success-alert" class="w-6 h-6 fill-current hidden">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                    </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" id="error-alert" fill="currentColor" class="bi bi-x-circle-fill w-5 h-5 hidden" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
                <p class="mx-3" id="message-alert"></p>
            </div>

            <button id="closeAlertBtn" class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
    <div class="relative shadow-md bg-white rounded-2xl">
        <div class="flex items-center justify-between py-4 w-full dark:bg-gray-800 px-10 pt-10">
            <a href="{{ url('/admin/examinee') }}" class="flex gap-3 items-center font-quicksand font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                <span>Back</span>
            </a>
        </div>
        <div class="w-full p-10 flex justify-between">
            <div class="flex gap-10">
                <div class="bg-dark-blue w-40 h-40 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                      </svg>
                </div>

                <div class="flex flex-col gap-5">
                    <h1 class="text-6xl font-bold font-quicksand">{{ $examinees_data->fname }} {{ $examinees_data->lname }}</h1>
                    <div class="flex flex-col font-quicksand font-medium gap-2">
                        @if($examinees_data->user_login_id)
                            <span>{{$examinees_data->userLogin->email}}</span>
                        @else
                            @if ($examinees_data->email)
                                <span>{{$examinees_data->email}}</span>
                            @else
                                {{"No Email Available"}}
                            @endif
                        @endif

                        <span>{{ $examinees_data->contact_number }}</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 mr-16">
                <div class="flex flex-col gap-2">
                    <a href="#" id="edit-btn" data-hs-overlay="#hs-vertically-centered-modal" class="font-medium hover:underline flex gap-2 items-center bg-dark-blue text-white py-2.5 px-5 rounded-2xl w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                          </svg>

                        <span class="font-semibold">Edit Applicant Data</span>
                    </a>
                    <a href="#" data-hs-overlay="#hs-slide-down-animation-modal2"  class="font-medium hover:underline flex gap-2 items-center bg-orange-500 py-2.5 px-5 rounded-2xl text-white w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                          </svg>
                          
                        <span class="font-semibold">Verify Status</span>
                    </a>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="#" data-popover-target="popover-description" data-popover-trigger="click" data-popover-placement="left" class="font-medium hover:underline flex gap-2 items-center bg-dark-yellow py-2.5 px-5 rounded-2xl w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                          </svg>

                        <span class="font-semibold">Send</span>
                    </a>
                    @if (!isset($examinees_data->user_login_id))
                        <a href="#" id="apply-btn" data-value="{{ $examinees_data->id }}" class="font-medium hover:underline flex gap-2 items-center bg-purple-400 py-2.5 px-5 rounded-2xl w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                            <span class="font-semibold">Apply</span>
                        </a>
                    @endif
                    @if (isset($examinees_data->user_login_id))
                        <a href="#" data-modal-target="deleteModal3" data-modal-show="deleteModal3" class="font-medium hover:underline flex gap-2 items-center bg-custom-red w-fit py-2.5 px-5 rounded-2xl text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span class="font-semibold">Delete</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="px-10 py-10">
            <div class="rounded-2xl overflow-hidden bg-dark-blue">
                <div class="p-10">
                    <h1 class="font-semibold font-quicksand text-3xl text-white mb-12">Exam History</h1>
                    <table class="w-full text-black text-sm text-left font-quicksand rounded-2xl overflow-hidden">
                        <thead class="text-sm uppercase bg-[#FDC500] dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Registration Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Approved Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Exam Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Exam Set
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Result
                            </th>
                        </tr>
                        </thead>
                        <tbody id="results" class="text-white">
                            @if (count($examinees_data->userHistory) === 0)
                                <tr class="bg-[#FDC500] bg-opacity-25">
                                    <td class="px-6 py-4 text-center" colspan="6">
                                        No Data
                                    </td>
                                </tr>
                            @endif
                            @foreach ($examinees_data->userHistory as $key => $user)
                                @if($key % 2 === 0)
                                    <tr class="bg-[#FDC500] bg-opacity-25">
                                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                            {{ date('F j, Y', strtotime($user->registration_date)) }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->approved_data }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ date('F j, Y g:i a', strtotime($user->schedule)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->exam_set }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->exam_result }}
                                        </td>
                                    </tr>
                                @else
                                    <tr class="bg-[#FDC500] bg-opacity-10">
                                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                            {{ date('F j, Y', strtotime($user->registration_date)) }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->approved_data }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ date('F j, Y g:i a', strtotime($user->schedule)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->exam_set }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->exam_result }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('AdminFunctions.add-applicant2')
  <div id="hs-slide-down-animation-modal2" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
          <h3 class="font-bold text-gray-800 dark:text-white">
            Update Application Status
          </h3>
          <button type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-slide-down-animation-modal2">
            <span class="sr-only">Close</span>
            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
            </svg>
          </button>
        </div>
        <form action="" id="submitAppForm">
            <div class="p-4 overflow-y-auto" x-data="{statusValue: ''}">
                <input type="hidden" name="exam_sched_id" value="">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select id="status" @change="statusValue = $event.target.value" name="validation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Disapproved</option>
                    <option value="2">Incomplete</option>
                    <option value="4">Approved</option>
                    <option value="5">Scheduled for exam</option>
                    <option value="6">Waiting for result</option>
                </select>
                <div class="mt-3 mb-3 md:mb-6 flex-1 flex-col" x-show="statusValue == 5">
                    <label for="exam-sched" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Exam Schedule</label>
                        <select
                            id="exam-sched"
                            name="exam-sched"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Exam Schedule"
                            :required="statusValue == 5"
                        >
                        @foreach ($examSched as $sched)
                            <option value="{{ $sched->id }}">{{ $sched->venue }}</option>
                        @endforeach
                    </select>
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                </div>

                <div class="mt-3 mb-3 md:mb-6 flex-1 flex-col" x-show="statusValue == 1 || statusValue == 2">
                    <label for="remarks" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Remarks</label>
                        <input
                            type="text"
                            id="remarks"
                            name="remarks"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            :required="statusValue == 1 || statusValue == 2"
                        >
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
              <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-slide-down-animation-modal2">
                Close
              </button>
              <button type="submit" id="submitApplicantStatus" data-value="{{ $examinees_data->id }}" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
                Save changes
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div id="hs-slide-down-animation-modal3" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
          <h3 class="font-bold text-gray-800 dark:text-white">
            Send Exam Result
          </h3>
          <button type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-slide-down-animation-modal3">
            <span class="sr-only">Close</span>
            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
            </svg>
          </button>
        </div>
        <form action="" id="submitResultAppForm" x-data="{ result: 'passed' }" data-value="{{ $examinees_data->id }}">
            @csrf
            <div class="p-4 overflow-y-auto">
                <label for="exam-result" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select id="exam-result" x-model="result" name="exam-result" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="passed" selected>Passed</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <div class="p-4 pt-0 flex-1 flex-col" x-show="result=='failed'">
                <label for="part1" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Part 1</label>
                    <input
                        type="text"
                        id="part1"
                        name="part1"
                        placeholder="Part 1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :required="result=='failed'"
                    >
                    <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
            </div>
            <div class="p-4 pt-0 flex-1 flex-col" x-show="result=='failed'">
                <label for="part2" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Part 2</label>
                    <input
                        type="text"
                        id="part2"
                        name="part2"
                        placeholder="Part 2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :required="result=='failed'"
                    >
                    <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
            </div>
            <div class="p-4 pt-0 flex-1 flex-col" x-show="result=='failed'">
                <label for="part3" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Part 3</label>
                    <input
                        type="text"
                        id="part3"
                        name="part3"
                        placeholder="Part 3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :required="result=='failed'"
                    >
                    <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
              <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-slide-down-animation-modal3">
                Close
              </button>
              <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">
                Save changes
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
<div id="deleteModal3" tabindex="-1" class="fixed top-0 left-0 right-0 z-[51] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
    <div class="relative w-full max-w-md max-h-full flex items-center">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="deleteModal3">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                <button id="delete" data-modal-hide="deleteModal3" data-value="{{ $examinees_data->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="deleteModal3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>

{{-- pop over --}}
<div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-48 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
    <div class="space-y-2">
        <div class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <a href="#" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                Send Transcript
            </a>
            <a href="#" data-hs-overlay="#hs-slide-down-animation-modal3" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                Send Exam Result
            </a>
        </div>

    </div>
    <div data-popper-arrow></div>
</div>
<div data-popover id="popover-description2" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-56 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
    <div class="space-y-2">
        <div class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <a href="#" data-hs-overlay="#hs-vertically-centered-modal" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                Update Examinee Application
            </a>
            <a href="#" data-hs-overlay="#hs-slide-down-animation-modal2" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                Update Application Status
            </a>
        </div>

    </div>
    <div data-popper-arrow></div>
</div>

<script>
    const messageAlert = document.querySelector("#message-alert");
    const dismissAlert = document.querySelector("#dismiss-alert");
    const closeAlertBtn = document.querySelector("#closeAlertBtn");
    const formInputs = document.querySelectorAll(
        "#add-applicant input, #add-applicant select"
    );
    const resultCon = document.querySelector("#results");
    const addApplicant = document.querySelector("#add-applicant");
    const headings = document.querySelectorAll("h3");
    const saveSign = document.querySelector('#save-btn')
    const signInput = document.querySelector('#signature')
    const clearSign = document.querySelector('#clear-btn')
    const canvas = document.querySelector('#signature-pad');
    const deleteBtn = document.querySelector('#delete');
    const dissmissAlert = document.querySelector('#dismiss-alert-session');
    const submitResultAppForm = document.querySelector('#submitResultAppForm');

    const applyBtn = document.querySelector('#apply-btn');

    applyBtn.addEventListener('click', async (event) => {
        event.preventDefault()
        let res = await fetch('/admin/examinee/'+event.currentTarget.dataset.value+'/apply-examinee');
        let data = await res.json();
        location.reload()
    })

    submitResultAppForm.addEventListener('submit', async (event) => {
        event.preventDefault()
        let formData = new FormData(event.currentTarget);

        let res = await fetch('/admin/examinee/'+event.currentTarget.dataset.value+'/send-result', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData,
        })

        let data = await res.json()

        if (data?.success) {
            dismissAlert.classList.remove("hidden");
            messageAlert.textContent = "Successfully Added";
            let targetHeading;
            for (let i = 0; i < headings.length; i++) {
                if (headings[i]?.textContent.trim() === "Send Exam Result") {
                    targetHeading = headings[i];
                    break;
                }
            }
            targetHeading.nextElementSibling.click();

            setTimeout(() => {
                dismissAlert.classList.remove("hidden");
                location.reload();
            }, 2000);
        }
    })

    const deleteApplicant = async (event) => {
        try {
            const id = event.target.dataset.value;
            let res = await fetch('/admin/examinee/'+id+"/deactivate");
            let data = await res.json();

            console.log(data)
        } catch (error) {
            console.log(error)
        }
    }
    deleteBtn.addEventListener('click', deleteApplicant)

    function listeners($data) {

        addApplicant.addEventListener("submit", async (event) => {
            event.preventDefault();

            const formData = new FormData(addApplicant);

            console.log(123)
            try {
                let res = await fetch("/admin/examinee/{{ $examinees_data->id }}/update-examinee", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData,
                });
                let data = await res.json();
                if(data?.errors) throw data.errors

                if (data === 1) {
                    dismissAlert.classList.remove("hidden");
                    messageAlert.textContent = "Successfully Added";
                    targetHeading.nextElementSibling.click();

                    setTimeout(() => {
                        dismissAlert.classList.remove("hidden");
                        location.reload();
                    }, 2000);
                }
            } catch (err) {
                console.log(0)
                errorHandler(err);
            }
        });
        const errorHandler = (err) => {

            let p = addApplicant.querySelectorAll("p")
            Array.from(p).forEach((el) => {
                    el.classList.add("hidden");
                }
            );
            for (const key in err) {
                formInputs.forEach((el) => {
                    if (el.name === key) {
                        if (el.parentElement.querySelector("p")) {
                            let p = el.parentElement.querySelector("p");
                            p.classList.remove("hidden");
                            p.textContent = err[key];
                        } else if (el.parentElement.parentElement.querySelector("p")) {
                            let p = el.parentElement.parentElement.querySelector("p");
                            p.classList.remove("hidden");
                            p.textContent = err[key];
                        } else {
                            let p =
                                el.parentElement.parentElement.parentElement.querySelector(
                                    "p"
                                );
                            p.classList.remove("hidden");
                            p.textContent = err[key];
                        }
                    }
                });
            }

            let hasSectionOneError = err.hasOwnProperty('givenName')
                        || err.hasOwnProperty('middleName')
                        || err.hasOwnProperty('surName')
                        || err.hasOwnProperty('tel')
                        || err.hasOwnProperty('province')
                        || err.hasOwnProperty('municipality')
                        || err.hasOwnProperty('barangay')
                        || err.hasOwnProperty('surName')
                        || err.hasOwnProperty('email')
                        || err.hasOwnProperty('pob')
                        || err.hasOwnProperty('dob')
                        || err.hasOwnProperty('gender')
                        || err.hasOwnProperty('citizenship')
                        || err.hasOwnProperty('civilStatus');

            let hasSectionTwoError = err.hasOwnProperty('thumbnail')
                || err.hasOwnProperty('status')
                || err.hasOwnProperty('images');

            let hasSectionThreeError = err.hasOwnProperty('presentOffice')
                || err.hasOwnProperty('telNum')
                || err.hasOwnProperty('officeAddress')
                || err.hasOwnProperty('officeCategory')
                || err.hasOwnProperty('designationPosition')
                || err.hasOwnProperty('yearsPresentPosition')
                || err.hasOwnProperty('pl');

            let hasSectionFourError = err.hasOwnProperty('signature')

            if(hasSectionOneError) {
                $data.state = 1;
            } else if(hasSectionTwoError) {
                $data.state = 2;
            } else if (hasSectionThreeError) {
                $data.state = 3;
            } else if (hasSectionFourError) {
                $data.state = 4;
            }
        };

        const submitApplicantStatus = document.querySelector('#submitApplicantStatus')
        const submitAppForm = document.querySelector('#submitAppForm')
        submitAppForm.addEventListener('submit', applicationStatusSubmit)
        async function applicationStatusSubmit(event) {
            event.preventDefault()
            try {
                let select = event.target.querySelector('select')
                let btn = event.target.querySelector('button[type=submit]')
                let status = select.value;
                let formData = new FormData(event.target);
                let res = await fetch('/admin/examinee/'+ btn.dataset.value +'/validation', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData
                });
                let data = await res.json();

                if (data?.success) {
                    dismissAlert.classList.remove("hidden");
                    messageAlert.textContent = "Successfully Added";
                    let targetHeading;
                    for (let i = 0; i < headings.length; i++) {
                        if (headings[i]?.textContent.trim() === "Update Application Status") {
                            targetHeading = headings[i];
                            break;
                        }
                    }
                    targetHeading.nextElementSibling.click();

                    setTimeout(() => {
                        dismissAlert.classList.remove("hidden");
                        location.reload();
                    }, 2000);
                }
            } catch(err) {
                console.log(err)
            }
        }
    }



    let targetHeading;
    for (let i = 0; i < headings.length; i++) {
        if (headings[i]?.nextElementSibling?.tagName === "BUTTON") {
            targetHeading = headings[i];
            break;
        }
    }

    closeAlertBtn.addEventListener("click", (_) => {
        dismissAlert.classList.toggle("hidden");
        location.reload();
    });

    const seminarsCon = document.querySelector("#seminars-attended-new");
    const addTrainings = document.querySelector("#add-trainings");
    const removeTrainings = document.querySelector("#remove-trainings");

    // const messageAlert = document.querySelector("#message-alert");
    // const dismissAlert = document.querySelector("#dismiss-alert");
    // const closeAlertBtn = document.querySelector("#closeAlertBtn");
    // const headings = document.querySelectorAll("h3");

    /**
    * Description placeholder
    * @date 5/17/2023 - 11:56:52 AM
    *
    * @param {string} [value=""]
    * @returns {string}
    */
    const trainingTemplate = ({ course, center, hours, id }) => {
        return `
            <div data-id="${id}" class="flex md:flex-row flex-col w-full gap-3 relative">
                <input type="hidden" name="trainingId[]" value="${id}">
                <div class="flex flex-1" >
                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                        <label for="" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Course / Seminar Title</label>
                            <input
                                type="text"
                                id=""
                                name="course[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="${course}"
                                placeholder="Course / Seminar Title"
                            >
                    </div>
                </div>
                <div class="flex flex-1" >
                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                        <label for="" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Training Center</label>
                            <input
                                type="text"
                                id=""
                                name="center[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="${center}"
                                placeholder="Training Center"
                            >
                    </div>
                </div>
                <div class="flex flex-1" >
                    <div class="mb-3 md:mb-6 flex-1 flex-col">
                        <label for="" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Total Training Hours</label>
                            <input
                                type="number"
                                id=""
                                name="hours[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="${hours}"
                                placeholder="Total Training Hours"
                            >
                    </div>
                </div>
            </div>
            `;
    };

    let toDeleteTrainings = [];

    const Trainings = {
        trainingTemplate: trainingTemplate,
        index: 1,

        add: function (value) {
            console.log(value);
            if(this.index > 3) return
            seminarsCon.insertAdjacentHTML("beforeend", this.trainingTemplate(value));
        },

        remove: function () {
            const semCon = document.querySelector("#seminars-attended-new");
            toDeleteTrainings.push(semCon.lastElementChild.dataset.id)
            semCon.lastElementChild.remove();
        },
    };



    addTrainings.addEventListener("click", () => Trainings.add({course: "", center: "", hours: 0, id:null}));
removeTrainings.addEventListener("click", () => Trainings.remove());
    @foreach ($examinees_data->trainingSeminars as $item)
        Trainings.add({course: "{{ $item->course }}", center: "{{ $item->center }}", hours: parseInt("{{ $item->hours }}"), id: {{ $item->id }}})
    @endforeach


    let isInitialSign = true;

        canvas.addEventListener('mousedown', () => {
            if (!isInitialSign) return
            canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);
            isInitialSign = false;
        })

        const signaturePad = new SignaturePad(canvas);

        clearSign.addEventListener("click", () => signaturePad.clear())

        @if(isset($examinees_data) && count($examinees_data->toArray()))
            const image = new Image();
            image.src = "{{ $examinees_data->e_sign }}";
            image.onload = function() {
                canvas.getContext("2d").drawImage(image, 0, 0, canvas.width, canvas.height);
            };
        @endif
        saveSign.addEventListener("click", async () => {
            const dataURL = signaturePad.toDataURL();
            signInput.value = dataURL;
            console.log(signInput.value)
            signInput.dispatchEvent(new Event('input'));
        })
</script>
@vite(["resources/js/admin/applicant.js", "resources/js/user/dashboard.js"])
@endsection
