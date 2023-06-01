@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'justify-center container mx-auto'>
    <div class = 'flex-col px-4 py-8'>
    <h1 class = 'text-3xl font-bold'>Government Web Hosting Service</h1>
    <br>
    <hr>
    <br>
     <p><b>Listed below are the requirements for application to:</b></p>   
    <ul class = 'list-disc pl-6'>
        <li>Web Hosting Service ONLY</li>
        <li>Updating of GWHS account information</li>
    </ul>
    <br>
    <br>
    <p><b>Reminders:</b></p>
    <ul class = 'list-disc pl-6'>
        <li>Email Hosting is not included in the Government Web Hosting Service. For the Government Wide eMail System (GovMail), please visit their How to Avail GovMail Page.</li>
        <li>.gov.ph DNS Registration Service is different from the DNS Hosting service and that the Web Hosting Service does not automatically include DNS Hosting. If you also need DNS Hosting, kindly send your concerns to dns@dict.gov.ph for further assistance.</li>
    </ul>
    <br>
    <br>
    <p>Requirements for websites:</p>
    <p>If using the prescribed CMS, the websute must be:</p>
    <ul class = 'list-disc pl-6'>
        <li>PHP version 5.4+</li>
        <li>Apache version 2.4.x</li>
        <li>MySQL version 5.5+</li>
        <li>WordPress CMS latest version</li>
        <li>Government Web Template (GWT) theme version 25.3.3</li>
        <li>Plugins installed should comply with the list of GWHS-approved plugins (please email gwhssupport@dict.gov.ph for a copy of the list) </li>
    </ul>
    <br>

    <p>Note: For the meantime, we highly encourage the use of WordPress due to the recent security issues encountered with Joomla and Drupal CS.</p>
    
    <br>

    <div id="accordion-arrow-icon" data-accordion="open">
    <h2 id="accordion-arrow-icon-heading-2">
        <button type="button" class="flex items-center justify-between w-fit p-5 font-medium text-left text-gray-500 border-2 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false" aria-controls="accordion-arrow-icon-body-2">
            <span>Web Hosting Service Only</span>
            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
         </button>
    </h2>
    <div id="accordion-arrow-icon-body-2" class="hidden" aria-labelledby="accordion-arrow-icon-heading-2">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
        <p><b>This is applicable only for agencies who are hosting their domains in-house and do not need the DNS Hosting Service.</b></p>
        <ol class = 'list-decimal pl-3'>
        <li>Submit an official letter of request, written in your agency’s letter head, stating that you are interested in the Government Web Hosting Service (GWHS). The letter should be signed by any of the following: Agency Head, Chief Information Officer, or MIS head. Address the letter of request to:
            <br>
            <ul class = 'list-none pl-8'>
                <br>
                <li>IVAN JOHN E. UY</li>
                <li>Secretary</li>
                <li>Department of Information and Communication Technology</li>
            </ul>
        </li>
            <br>
        <li>Accomplish the Web Hosting Service Application Form. Details in the form should be specific and correct. Please write legibly.</li>
        <br>
        <li>Submit the scanned application form (in PDF format) together with the letter of request to <a href = 'mailto: gwhssupport@dict.gov.ph' class = 'hover:text-sky-500'>gwhssupport@dict.gov.ph</a>, then, indicate your agency name and the service you are availing in the email subject.  An email notification will be sent to the authorized persons you indicated in your application form.</li>
        <br>
        <li>For other concerns, you can email <a href = 'mailto: gwhssupport@dict.gov.ph' class = 'hover:text-sky-500'>gwhssupport@dict.gov.ph</a>.</li> 
        </ol>
        </div>
    </div>

    <br>

        <h2 id="accordion-arrow-icon-heading-3">
        <button type="button" class="flex items-center justify-between w-fit p-5 font-medium text-left text-gray-500 border-2 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false" aria-controls="accordion-arrow-icon-body-3">
            <span>Updating of GWHS Account Information</span>
            <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
        </button>
        </h2>
    <div id="accordion-arrow-icon-body-3" class="hidden" aria-labelledby="accordion-arrow-icon-heading-3">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
      <p><b>This is applicable for agencies with existing GWHS cPanel accounts in the servers of the DICT and want to update the account information indicated in the previously submitted application form.</b></p>
      <ol class = 'list-decimal pl-3'>
        <li>Accomplish the GWHS Account Modification Form. Details in the form should be specific and correct. Please write legibly.</li>
            <br>
        <li>Submit the modification form to gwhssupport@dict.gov.ph and wait for an email notification regarding your request. The notice will be emailed to the authorized persons you indicated in the modification form.</li>
        <br>
        <li>For other concerns, you can email <a href = 'mailto: gwhssupport@dict.gov.ph' class = 'hover:text-sky-500'>gwhssupport@dict.gov.ph</a>.</li> 
        </ol>
        </div>
        </div>
    </div>
            <br>
            <br>

</div>
        </div>

<div class= "w-full bg-[#2C2C2C] text-white text-xs p-4">
   <div class="flex flex-row container mx-auto ">
    <section class="w-full">
      <footer class="text-white w-full">
        <div class="w-full">
          <div class="flex justify-evenly gap-10 flex-wrap">
              <div class="">
                 <img
                  src="{{ asset('img/gov-seal2.png') }}"
                  class="w-[8rem] lg:w-[10rem]"/>
              </div>

              <div class="flex-1 xl:flex-2">
                  <h5 class="font-bold text-base">REPUBLIC OF THE PHILIPPINES</h5>
                  <br>
                  <p>
                    All contain is in the public domain unless otherwise stated.
                  </p>
              </div>
              <div class="flex-1">
                  <h5 class="font-bold text-base">ABOUT GOVPH</h5>
                  <br>
                  <p>
                    Learn more about the Philippine government, its structure,
                    <br> how government works and the people behind it.
                  </p>
                  <br>
                  <ul class="list-unstyled mb-0">
                     <li>
                      <a href="https://www.gov.ph/" class = 'hover:text-sky-500'>GOV.PH</a>
                     </li>
                      <li>
                         <a href="https://www.gov.ph/data" class = 'hover:text-sky-500'>Open Data Portal</a>
                      </li>
                      <li>
                         <a href="https://www.officialgazette.gov.ph/" class = 'hover:text-sky-500'>Official Gazette</a>
                      </li>
                  </ul>
              </div>
                <div class="flex-1">
                    <h5 class="text-uppercase font-bold text-base">GOVERNMENT LINKS</h5>
                    <br>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class = 'hover:text-sky-500'>Office of the President</a>
                        </li>
                        <li>
                            <a href="http://ovp.gov.ph/" class = 'hover:text-sky-500'>Office of the Vice President</a>
                        </li>
                        <li>
                            <a href="http://legacy.senate.gov.ph/" class = 'hover:text-sky-500'>Senate of the Philippines</a>
                        </li>
                        <li>
                            <a href="https://www.congress.gov.ph/" class = 'hover:text-sky-500'>House of Representatives</a>
                        </li>
                        <li>
                            <a href="https://www.officialgazette.gov.ph/" class = 'hover:text-sky-500'>Official Gazette</a>
                        </li>
                        <li>
                            <a href="https://sc.judiciary.gov.ph/" class = 'hover:text-sky-500'>Supreme Court</a>
                        </li>
                        <li>
                            <a href="https://sb.judiciary.gov.ph/" class = 'hover:text-sky-500'>Sandiganbayan</a>
                        </li>
                    </ul>
                </div>
           </div>
        </div>
     </footer>
    </section>
   </div>
</div>


@endsection