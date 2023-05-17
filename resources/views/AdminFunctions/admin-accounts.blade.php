@extends('layouts.layout')

@section('content')

<div x-data="{ deleteSelected: 0 }"
x-init="">
    <div class="relative">
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
                        <select name="reg_status" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Role</option>
                            <option value="1">Writer</option>
                            <option value="0">Creator</option>
                            <option value="0">Super Admin</option>
                        </select>
                        <select name="order_by" class="bg-custom-blue py-3 font-quicksand bg-opacity-10 font-semibold border-none text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Sort</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="relative h-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" name="search" id="table-search" class="block h-full p-2.5 py-3 font-quicksand pl-10 text-base text-gray-900 border-0 rounded-lg w-48 bg-[#E6EEF6] focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
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
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Office
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody id="results">
                            @foreach ($data as $key => $admin)
                            @if($key % 2 === 0)
                            <tr class="bg-[#FDC500] bg-opacity-25">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $admin->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $admin->designation }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $admin->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $admin->office }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium hover:underline">Edit</a>
                                    <a href="#" @click="deleteSelected = {{ $admin->id }}" data-modal-target="deleteModal" data-modal-show="deleteModal" class="font-medium hover:underline text-custom-red">Delete</a>
                                </td>
                            </tr>
                        @else
                            <tr class="bg-[#FDC500] bg-opacity-10">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $admin->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $admin->designation }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $admin->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $admin->office }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium hover:underline">Edit</a>
                                    <a href="#" @click="deleteSelected = {{ $admin->id }}" data-modal-target="deleteModal" data-modal-show="deleteModal" class="font-medium hover:underline text-custom-red">Delete</a>
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

    {{-- Add Account Modal --}}

    <div id="hs-vertically-centered-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-[30rem] sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="flex flex-col bg-white w-fit border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
            <h3 class="font-bold text-gray-800 dark:text-white font-quicksand">
                Add Admin Account
            </h3>
            <button type="button" id="close-btn" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-vertically-centered-modal">
                <span class="sr-only">Close</span>
                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>
                </svg>
            </button>
            </div>
            <form action="" method="POST" id="form">
                <div class="p-4 overflow-y-auto w-[30rem]">
                    <div class="mb-3 md:mb-5 flex-1 flex-col">
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Email"
                            >
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="mb-3 md:mb-5 flex-1 flex-col">
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Password</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Password"
                            >
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="mb-3 md:mb-5 flex-1 flex-col">
                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Name"
                            >
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="mb-3 md:mb-5 flex-1 flex-col">
                        <label for="office" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Office</label>
                            <input
                                type="text"
                                id="office"
                                name="office"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Office"
                            >
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="mb-3 md:mb-5 flex-1 flex-col">
                        <label for="role" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">Choose a role</option>
                            <option value="100">Super Admin</option>
                            <option value="200">Normal Admin</option>
                            <option value="300">Content Manager</option>
                        </select>
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="mb-3 md:mb-5 flex-1 flex-col">
                        <label for="designation" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Designation</label>
                            <input
                                type="text"
                                id="designation"
                                name="designation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Designation"
                            >
                        <p class="mt-2 hidden text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                </div>
                <div class="flex justify-end items-center w-full border-t">
                    <div class="flex gap-2 p-4">
                        <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 flex-1">
                            Back
                        </button>

                        <button type="submit" class="text-white bg-dark-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-dark-blue dark:focus:ring-blue-800 flex-1">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>


    {{-- Delete Modal --}}
    <div id="deleteModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-[51] hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
        <div class="relative w-full max-w-md max-h-full flex items-center">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this item?</h3>
                    <button @click="deleteAdminAccount(deleteSelected)" data-modal-hide="deleteModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="deleteModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.querySelector("#form");
    const messageAlert = document.querySelector("#message-alert");
    const dismissAlert = document.querySelector("#dismiss-alert");
    const closeAlertBtn = document.querySelector("#closeAlertBtn");
    const formInputs = form.querySelectorAll("input, select");
    const closeBtn = document.querySelector("#close-btn");

    async function deleteAdminAccount(data) {
        try {
            let res = await axios.delete('/admin/dict-admins/delete/' + data);
            if (res.data) {
                dismissAlert.classList.remove("hidden");
                messageAlert.textContent = "Deleted Successfully";

                setTimeout(() => {
                    dismissAlert.classList.remove("hidden");
                    location.reload();
                }, 2000);
            }

        } catch(e) {
            console.log(e)
        }
    }

    closeAlertBtn.addEventListener("click", (_) => {
        dismissAlert.classList.toggle("hidden");
        location.reload();
    });

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        let formData = new FormData(event.target);

        try {
            let req = await axios.post("/admin/dict-admins/create", formData);
            if (req.status === 200) {
                dismissAlert.classList.remove("hidden");
                messageAlert.textContent = "Successfully Added Admin Account";
                closeBtn.click();

                setTimeout(() => {
                    dismissAlert.classList.remove("hidden");
                    location.reload();
                }, 2000);
            }
        } catch (e) {
            errorHandler(e.response?.data?.errors);
        }
    });

    const errorHandler = (err) => {
        formInputs.forEach((el) => el.nextElementSibling.classList.add("hidden"));
        for (const key in err) {
            formInputs.forEach((el) => {
                if (el.name === key) {
                    el.nextElementSibling.classList.remove("hidden");
                    el.nextElementSibling.textContent = err[key];
                }
            });
        }
    };

</script>

@endsection
