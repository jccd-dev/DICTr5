<!doctype html>
<html lang="en">
<head>
    <x-metadata.header />
</head>
<body class="font-quicksand">
    <x-user.navbar />
    <div class="container mx-auto">
        <div class="lg:flex lg:flex-row justify-start">
            {{-- Column 1 --}}
            <div class="basis-4/6 m-2">
                <div class="w-full bg-[#00296B] rounded-lg p-3 text-white">
                    <div class="md:flex md:flex-row px-5 py-12">
                        <div class="basis-9/12">
                            <div class="md:flex md:flex-row">
                                <div class="basis-2/6 flex justify-center">
                                    <img src="{{asset('img/passportsize.jpg')}}" class="object-cover w-32 h-48 rounded">
                                </div>
                                <div class="basis-4/6 text-center md:text-start">
                                    <br>
                                    <span class="font-bold text-2xl">Keanu Reeves</span><br>
                                    <span>keanu.reeves@gmail.com</span><br>
                                    <span>Professional</span>
                                    <br><br><br>
                                    <table>
                                        <tr>
                                            <td class="text-start">Date of Birth: </td>
                                            <th class="text-left pl-1">September 2, 1964</th>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Gender: </td>
                                            <th class="text-left pl-1">Male</th>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Address: </td>
                                            <th class="text-left pl-1">San Miguel, Nabua, Camarines Sur</th>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Mobile #: </td>
                                            <th class="text-left pl-1">092785497785</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="basis-3/12 text-center md:text-right my-5 md:my-0">
                            <button type="button" class="my-1 text-white bg-[#C1121F] hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg px-6 py-3.5 text-center w-48">Update Form</button>
                            <br>
                            <button type="button" class="my-1 text-black bg-[#FDC500] hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-6 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-48">Download Completed Application Form</button>
                        </div>
                    </div>
                </div>

                <div class="my-5">
                    <span class="text-lg font-bold my-5">Upcoming Exam</span><br>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Date of Exam
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Time
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Venue
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    February 10, 2023
                                </th>
                                <td class="px-6 py-4">
                                    9:00 AM - 12:00 PM
                                </td>
                                <td class="px-6 py-4">
                                    Naga City Digital Innovation Hub
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    May 24, 2023
                                </th>
                                <td class="px-6 py-4">
                                    9:00 AM - 12:00 PM
                                </td>
                                <td class="px-6 py-4">
                                    Naga City Digital Innovation Hub
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                    <span class="text-lg font-bold">Exam History</span><br>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                <th scope="col" class="px-6 py-3 w-44">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Result
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    February 10, 2023
                                </th>
                                <td class="px-6 py-4">
                                    03-10-2023
                                </td>
                                <td class="px-6 py-4">
                                    05-24-2023
                                </td>
                                <td class="px-6 py-4">
                                    Naga City Digital Innovation Hub
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-[#E35F00] text-white text-xs py-1 px-3 font-semibold rounded">Incomplete Req.</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" data-modal-target="failed_modal" data-modal-toggle="failed_modal" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-3 py-1 text-center">View</button>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    May 24, 2023
                                </th>
                                <td class="px-6 py-4">
                                    03-10-2023
                                </td>
                                <td class="px-6 py-4">
                                    05-24-2023
                                </td>
                                <td class="px-6 py-4">
                                    Naga City Digital Innovation Hub
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-[#C1121F] text-white text-xs py-1 px-3 font-semibold rounded">Disapprove</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-xs px-3 py-1 text-center">View</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <span class="bg-[#FFD500] text-black text-xs py-1 px-3 font-semibold rounded">For Evaluation</span> <br>
                    <span class="bg-[#65E02B] text-black text-xs py-1 px-3 font-semibold rounded">Approved</span> <br>
                    <span class="bg-[#00509D] text-white text-xs py-1 px-3 font-semibold rounded">Waiting for Result</span> <br>
                </div>
            </div>
            {{-- Column 2 --}}
            <div class="basis-2/6 m-2">
                <h3 class="text-lg font-bold my-5">Downloadable Forms/Documents</h3>
                <a href="#" class="text-sm flex flex-row">
                    <svg fill="none" class="w-5 mx-4 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3"></path>
                    </svg>
                    Frequently Ask Questions
                </a>
                <a href="#" class="text-sm flex flex-row">
                    <svg fill="none" class="w-5 mx-4 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3"></path>
                    </svg>
                    Application Form
                </a>
                <a href="#" class="text-sm flex flex-row">
                    <svg fill="none" class="w-5 mx-4 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3"></path>
                    </svg>
                    Transcript
                </a>

                <h3 class="text-lg font-bold my-5">Uploaded Files</h3>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th colspan="2" scope="col" class="px-6 py-3">
                                File Name
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="flex flex-row px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                </svg>
                                TOR_ Reeves.pdf
                            </th>
                            <td class="px-6 py-4">
                                <button type="button" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</button>
                                <button type="button" class="px-3 py-1 text-xs font-medium text-center text-white bg-[#00509D] rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Replace</button>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="flex flex-row px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                </svg>
                                Birth_Certificate.png
                            </th>
                            <td class="px-6 py-4">
                                <button type="button" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</button>
                                <button type="button" class="px-3 py-1 text-xs font-medium text-center text-white bg-[#00509D] rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Replace</button>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="flex flex-row px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <svg fill="none" class="w-5 text-[#00509D]" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                                </svg>
                                PassportSizeImage.jpg
                            </th>
                            <td class="px-6 py-4">
                                <button type="button" class="px-3 py-1 text-xs font-medium text-center text-black bg-[#FDC500] rounded-lg hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-yellow-200">Preview</button>
                                <button type="button" class="px-3 py-1 text-xs font-medium text-center text-white bg-[#00509D] rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">Replace</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <br>

                <div class="rounded-lg bg-[#D9D9D9] p-3 px-5">
                    <h4 class="font-bold mb-3">How to register?</h4>
                    <ol class="list-decimal list-inside ml-5 mb-3">
                        <li class="mb-1">Lorem ipsum dolor sit amet.</li>
                        <li class="mb-1">Consectetur adipiscing elit.</li>
                        <li class="mb-1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li class="mb-1">Ut enim ad minim veniam, </li>
                    </ol>

                    <h4 class="font-bold mb-3">Requirements</h4>
                    <ol class="list-decimal list-inside ml-5 mb-3">
                        <li class="mb-1">Lorem ipsum dolor sit amet.</li>
                        <li class="mb-1">Consectetur adipiscing elit.</li>
                        <li class="mb-1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li class="mb-1">Ut enim ad minim veniam, </li>
                    </ol>

                    <h4 class="font-bold mb-3">Coverage of Exam</h4>
                    <ol class="list-decimal list-inside ml-5 mb-3">
                        <li class="mb-1">Lorem ipsum dolor sit amet.</li>
                        <li class="mb-1">Consectetur adipiscing elit.</li>
                        <li class="mb-1">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li class="mb-1">Ut enim ad minim veniam, </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Modal -->
    <!-- Failed -->
    <div id="failed_modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Static modal
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="failed_modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

