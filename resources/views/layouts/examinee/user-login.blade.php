@extends('layouts.main-layout')

@section("content")
    <div class="flex h-screen ">
        <div class="flex flex-col flex-1 px-5 sm:px-10 lg:px-0 ml-0 lg:ml-12 xl:ml-24 2xl:ml-32 py-10 lg:py-[10vh]">
            <a href="{{route('homepage')}}" class="flex flex-row font-quicksand">
                <svg fill="none" class="w-12 text-custom-blue" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-bold text-xl p-3">Go back to homepage</span>
            </a>
            <br>
            <div class="font-quicksand h-full flex lg:items-center">
                <div class="w-full mb-14 m-3 2xl:w-3/4 lg:px-5 xl:px-20">
                    <div class="bg-[#00296B] text-white p-5 text-center rounded-xl py-12">
                        <img src="{{asset('img/ILCDB.png')}}" class="w-28 lg:w-36 2xl:w-48 mx-auto">
                        <h3 class="text-xl lg:text-2xl 2xl:text-3xl font-bold mt-10">ICT Proficiency Exam Login</h3>
                        <p class="text-sm mt-5">Sign-in with google for faster registration. <br> No need for remembering passwords. <br> Just sign-in and your good to go!</p>
                        <a href="{{route('redirect.google')}}" type="button" class="mt-10 font-bold bg-white text-slate-900 rounded-lg px-5 py-2.5 text-center inline-flex items-center">
                            <img src="{{asset('img/googleicon.svg')}}" class="w-8 pr-3" />
                            Sign in with Google
                        </a>
                        @if(session()->get('alert_message'))
                            <br><br>
                            <div class="flex p-4 mb-4 text-sm text-center text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Login Alert!</span> {{session()->get('alert_message')}}
                                </div>
                            </div>
                        @endif
                        <hr class="mt-5 xl:mt-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-400 to-transparent opacity-100 dark:opacity-150" />
                        @php
                        session()->forget('alert_message');
                        @endphp
                        <p class="pt-7 xl:pt-12 font-bold text-sm">
                            By using this service, you understood and agree to the DICT Camarines Sur Online Services <button data-modal-target="term_of_use" data-modal-toggle="term_of_use" class="text-red-600">Terms of Use</button> and <button data-modal-target="privacy_statement" data-modal-toggle="privacy_statement" class="text-red-600">Privacy Statement.</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

       <div class="hidden lg:block flex-1 h-full w-auto overflow-hidden rounded-bl-[10rem]">
           <img src="{{asset('img/ico/DICT(1).png')}}" class="h-full w-full object-cover">
       </div>

        <br>


        <!-- Term of Use -->
        <div id="term_of_use" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Use
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="term_of_use">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 indent-10 text-justify">
                            We operate the DICT Region 5 - Camarines Sur website, as well as any other related
                            online services. By proceeding with this form, you consent to the collection and
                            processing of some of your personal information to fill in the fields of the ICT
                            Proficiency Examination form.

                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 indent-10 text-justify">
                            These Legal Terms constitute a legally binding agreement made between you, whether personally
                            or on behalf of an entity ("you"), and DICT Camarines Sur,  concerning your access to and
                            use of the Services. You agree that by accessing the Services, you have read, understood,
                            and agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF THESE
                            LEGAL TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SERVICES AND YOU MUST
                            DISCONTINUE USE IMMEDIATELY.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 indent-10 text-justify">
                            Supplemental terms and conditions or documents that may be posted on the Services from
                            time to time are hereby expressly incorporated herein by reference. We reserve the right,
                            in our sole discretion, to make changes or modifications to these Legal Terms at any time
                            and for any reason. We will update the "Last updated" date of these Legal Terms. It is your
                            responsibility to periodically review these Legal Terms to stay informed of updates.
                            You will be subject to, and will be deemed to have been made aware of and to have accepted,
                            the changes in any revised Legal Terms by your continued use of the Services after the date
                            such revised Legal Terms are posted.

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Privacy Statement -->
        <div id="privacy_statement" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Privacy Statement
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="privacy_statement">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            Your privacy is important to us at DICT Region V - Camarines Sur. This policy describes the categories of personal data we collect and how we use it.
                        </p>
                        <h6 class="text-gray-800 font-semibold">Information we gather</h6>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            We will only use the personal information you voluntarily give us—such as your name or email address—for the intended purpose. Without your permission, we will not disclose any of your personal information to other parties unless it is necessary to comply with the law.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            To keep track of your preferences and improve your experience on our website, we use cookies. When you visit our website, a tiny text file called a cookie is saved on your computer. The ability to utilize some parts of our website may be restricted if you opt to deactivate cookies in your browser's settings.
                        </p>
                        <h6 class="text-gray-800 font-semibold">Third party links</h6>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            Links to other websites may be found on our website. The privacy policies or content of these websites are not our responsibility. Before submitting any personal information to these websites, we advise you to examine their privacy policies.
                        </p>
                        <h6 class="text-gray-800 font-semibold">Data Security</h6>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            We take precautions that are reasonable to prevent unauthorized access, use, or disclosure of your personal information. Unfortunately, no online data transfer can be guaranteed to be 100 percent safe. As a result, you send any information to us at your own risk because we are unable to guarantee its security.
                        </p>
                        <h6 class="text-gray-800 font-semibold">Modifications to this policy</h6>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            We retain the right to change or amend this privacy statement whenever we see fit. We will send you an email or post a notice on our website if we make any significant changes to this policy.
                        </p>
                        <h6 class="text-gray-800 font-semibold">Contact Us</h6>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 text-justify">
                            Email us at <a href="mailto:ralph.talagtag@dict.gov.ph" class="italic">ralph.talagtag@dict.gov.ph</a> if you have any questions or issues about our privacy statement.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
