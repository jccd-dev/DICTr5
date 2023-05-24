@extends('layouts.layout')

@section('content')

<div class="relative" x-data=""
     x-init="">
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
                        <span>{{ $examinees_data->userLogin->email }}</span>
                        <span>{{ $examinees_data->contact_number }}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 mr-16">
                <a href="#" data-hs-overlay="#hs-vertically-centered-modal" class="font-medium hover:underline flex gap-2 items-center bg-dark-blue py-2.5 px-5 rounded-2xl text-white w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                    <span class="font-semibold">Edit</span>
                </a>
                <a href="#" class="font-medium hover:underline flex gap-2 items-center bg-dark-yellow py-2.5 px-5 rounded-2xl w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                      </svg>

                    <span class="font-semibold">Send Transcript</span>
                </a>
                <a href="#" data-modal-target="deleteModal3" data-modal-show="deleteModal3" class="font-medium hover:underline flex gap-2 items-center bg-custom-red w-fit py-2.5 px-5 rounded-2xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                    <span class="font-semibold">Delete</span>
                </a>
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
                                Venue
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
                                            {{ $examinees_data->userHistory->registration_date }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->approved_data }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->schedule }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->exam_set }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->result }}
                                        </td>
                                    </tr>
                                @else
                                    <tr class="bg-[#FDC500] bg-opacity-10">
                                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                            {{ $examinees_data->userHistory->registration_date }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->approved_data }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->schedule }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->exam_set }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $examinees_data->userHistory->result }}
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
@include('AdminFunctions.add-applicant')
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
                <button data-modal-hide="deleteModal3" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="deleteModal3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
