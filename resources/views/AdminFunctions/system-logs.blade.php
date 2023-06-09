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
                    <select name="admins" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">admins</option>
                        @foreach ($names as $name)
                            <option value="{{$name->name}}">{{$name->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-3 items-center">
                    @can('delete_content', auth('jwt')->user())
                    <div>
                        <a
                            href="{{ route('admin.clean-logs') }}"
                            class="font-bold font-quicksand bg-custom-blue bg-opacity-10 hover:bg-opacity-20 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                            Clean Logs
                        </a>
                    </div>
                    <div>
                        <a
                            href="{{ route('admin.glogs') }}"
                            class="font-bold font-quicksand bg-custom-blue bg-opacity-10 hover:bg-opacity-20 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2">
                            Generate Logs
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
        </form>
        <div class="px-10 py-10">
            <div class="rounded-2xl overflow-hidden">
                <table class="w-full text-black text-sm text-left font-quicksand">
                    <thead class="text-sm uppercase bg-[#FDC500] dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Admin Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Activity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            End Point
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Timestamp
                        </th>
                    </tr>
                    </thead>
                    <tbody id="results">
                        @foreach ($data as $key => $item)
                            @php
                                $role = '';
                                switch ($item->admin->role) {
                                    case 100: // super admin
                                        # show all data
                                        $role = 'Super admin';
                                        break;
                                    case 200: // normal admin
                                        $role = "Admin";
                                        break;
                                    case 300: // creator (cms)
                                        $role = "Creator";
                                        break;
                                }
                            @endphp
                            @if($key % 2 === 0)
                                <tr class="bg-[#FDC500] bg-opacity-25">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $item->admin->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $role }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->activity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->end_point }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date('F j, Y g:i a', strtotime($item->timestamp)) }}
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-[#FDC500] bg-opacity-10">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $item->admin->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $role }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->activity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->end_point }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date('F j, Y g:i a', strtotime($item->timestamp)) }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-10 flex flex-col">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@vite(['resources/js/admin/logs.js'])
@endsection
