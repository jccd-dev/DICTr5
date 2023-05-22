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
        <form id="search-form" class="flex w-full">
            <div class="flex items-center justify-between py-4 w-full dark:bg-gray-800 px-10 pt-10">
                <div class="flex gap-3">
                    <select name="gender" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select Gender</option>
                        <option value="male" {{ $searchValues['gender'] === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $searchValues['gender'] === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <select name="curr_status" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select Status</option>
                        <option value="student" {{ $searchValues['curr_status'] === 'student' ? 'selected' : '' }}>Student</option>
                        <option value="professional" {{ $searchValues['curr_status'] === 'professional' ? 'selected' : ''}}>Professional</option>
                    </select>
                    <select name="reg_status" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select Status</option>
                        <option value="1" {{ $searchValues['reg_status'] == '1' ? 'selected' : ''}}>Approved</option>
                        <option value="2" {{ $searchValues['reg_status'] == '2' ? 'selected' : ''}}>Pending</option>
                    </select>
                    <select name="is_applied" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Registration</option>
                        <option value="1" {{ $searchValues['is_applied'] == '1' ? 'selected' : ''}}>Applied</option>
                        <option value="2" {{ $searchValues['is_applied'] == '2' ? 'selected' : ''}}>Not Applied</option>
                    </select>
                    <select name="applicant" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Applicants</option>
                        <option value="1" {{ $searchValues['applicant'] == '1' ? 'selected' : ''}}>Online</option>
                        <option value="2" {{ $searchValues['applicant'] == '2' ? 'selected' : ''}}>Manual</option>
                    </select>
                </div>
                <div class="flex gap-3 items-center">
                    <div class="relative h-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" name="search_text" value="{{ $searchValues['search_text'] ?? '' }}"id="table-search" class="block h-full p-2.5 py-3 font-quicksand pl-10 text-base text-gray-900 border-0 rounded-lg w-48 bg-[#E6EEF6] focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                    </div>
                    <div>
                        <button
                            type="button"
                            data-hs-overlay="#hs-vertically-centered-modal"
                            class="font-bold font-quicksand bg-custom-blue bg-opacity-10 hover:bg-opacity-20 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 -ml-2 text-dark-blue">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="px-10 pb-10">
            <div class="rounded-2xl overflow-hidden">
                <table class="w-full text-black text-sm text-left font-quicksand">
                    <thead class="text-sm uppercase bg-[#FDC500] dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Registration Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Set
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applicant Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody id="results">
                        @foreach ($data as $key => $user)
                            @if($key % 2 === 0)
                                <tr class="bg-[#FDC500] bg-opacity-25">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $user->formatted_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ ucfirst($user->gender) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ ucfirst($user->current_status) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->addresses ? $user->addresses->formatted_address : '' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->tertiaryEdu ? $user->tertiaryEdu->degree : '' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose status</option>
                                            <option value="0">Disapproved</option>
                                            <option value="1">Incomplete Requirements</option>
                                            <option value="2">For Evaluation</option>
                                            <option value="3">Approved</option>
                                            <option value="4">Waiting for Result</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4">
                                        <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose status</option>
                                            <option value="0">Failed</option>
                                            <option value="1">Processing</option>
                                            <option value="2">Passed</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button
                                            data-popover-target="popover-animation"
                                            data-popover-trigger="click"
                                            data-popover-placement="bottom"
                                            type="button"
                                            class="bg-[#00509D] bg-opacity-10 rounded-xl p-2"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-[#FDC500] bg-opacity-10">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $user->formatted_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->gender }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->current_status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->addresses ? $user->addresses->formatted_address : '' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->tertiaryEdu ? $user->tertiaryEdu->degree : '' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose status</option>
                                            <option value="0">Disapproved</option>
                                            <option value="1">Incomplete Requirements</option>
                                            <option value="2">For Evaluation</option>
                                            <option value="3">Approved</option>
                                            <option value="4">Waiting for Result</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4">
                                        <select class="bg-[#00509D] bg-opacity-10 border-none text-black text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose status</option>
                                            <option value="0">Failed</option>
                                            <option value="1">Processing</option>
                                            <option value="2">Passed</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button
                                            data-popover-target="popover-animation"
                                            data-popover-trigger="click"
                                            data-popover-placement="bottom"
                                            type="button"
                                            class="bg-[#00509D] bg-opacity-10 rounded-xl p-2"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
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
  @include('AdminFunctions.add-applicant')

<div data-popover id="popover-animation" role="tooltip" class="absolute z-10 invisible inline-block w-48 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    <div class="flex flex-col gap-1">
        <div class="px-3 py-2 cursor-pointer hover:bg-blue-100">
            <p class="flex gap-3 items-center font-quicksand font-semibold text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                  </svg>
                View
            </p>
        </div>

        <div class="px-3 py-2 cursor-pointer hover:bg-blue-100">
            <p class="flex gap-3 items-center font-quicksand font-semibold text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                  </svg>
                History
            </p>
        </div>

        <div class="px-3 py-2 cursor-pointer hover:bg-blue-100">
            <p class="flex gap-3 items-center font-quicksand font-semibold text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                Edit Data
            </p>
        </div>

        <div class="px-3 py-2 cursor-pointer hover:bg-blue-100">
            <p class="flex gap-3 items-center font-quicksand font-semibold text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                Delete
            </p>
        </div>

        <div class="px-3 py-2 cursor-pointer hover:bg-blue-100">
            <p class="flex gap-3 items-center font-quicksand font-semibold text-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                  </svg>
                Send Transcript
            </p>
        </div>
    </div>
</div>
@vite(['resources/js/admin/examinees_list.js'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // $(document).ready(function(){
    //     $('#search-form input, #search-form select').on('change, input', function() {
    //         var formData = $('#search-form').serialize();
    //         $.ajax({
    //             url: '{{ route('search') }}',
    //             type: 'GET',
    //             data: formData,
    //             success: function(data) {
    //                 $('#results').html(data);
    //             }
    //         });
    //     });
    // })
</script>

@endsection
