@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'justify-center container mx-auto'>
    <div class = 'flex-col px-4 py-8'>
    <h1 class = 'text-xl font-bold'>GOVERNMENT-WIDE EMAIL SYSTEM (GOVMAIL)</h1>
    <br>
    <hr>
    <br>
        <p>The <b>Government-wide Email System (GovMail)</b> offers the government agencies their own user address which official accounts and emails coming from the agencies.</p>
        <br>
        <p>A user@agency.gov.ph address tells people that the person belongs to the agency named in the GovMail account. It gives credibility and weight to the email.</p>
        <br>
        <p>The <b>GovMail system</b> is in line with the e-Government Master Plan that aims to modernize government processes to improve the delivery of goods and services to the public and promote transparency. Citizens will also benefit in terms of confidence and peace of mind knowing that they are dealing with authentic government agencies.</p>
        <br>
        <p>Reminder: all the Requesting Agencies must have an existing Domain Name. For more information, you may check this  <a href="" class = 'text-sky-700 hover:text-sky-400'>link</a> or contact dns@dict.gov.ph.</p>
        <br>
        <p><b>How to Avail GovMail</b></p>
        <br>
            <ol class = 'list-decimal pl-6'>
                <li>Submit the following documents both by postal mail and email, <a href="mailto:govmailsupport@dict.gov.ph" class = 'text-sky-700 hover:text-sky-400'>govmailsupport@dict.gov.ph</a>.</li>
                    <ul class = 'list-disc pl-9'>
                        <br>
                        <li>Duly accomplished Letter of Intent signed by the Head of the Agency:</li>
                        <br>
                            <ul class = 'list-none pl-12'>
                                <li>Address the letter of intent to:</li>
                                <br>
                                <hr>
                                <br>
                                <br>
                            
                                <ul class = 'list-none pl-[5rem]'>
                                    <li><b>IVAN JOHN E. UY</b></li>
                                    <li>Secretary</li>
                                    <li><b>Department of Information and Communications Technology</b></li>
                                    <li>DICT Building, C.P. Garcia Avenue, Diliman, Quezon City, 1101 Philippines</li>
                                    <li>+63 (02) 8-920-0101 local 3001/3000.</li>
                                </ul>
                                <br>
                                <hr>
                                <br>
                            </ul>
                                
                        <li>Duly accomplished <a href = "https://dict.gov.ph/wp-content/uploads/2022/10/GovMail.AccountTemplate.20180323.xlsx" class = 'text-sky-700 hover:text-sky-400'>Govmail Account Template</a> verified and signed by the HR Head</li>
                        <br>
                        <li>Duly accomplished <a href = "https://dict.gov.ph/wp-content/uploads/2022/10/GovMail-Forum-Form.v2.pdf" class = 'text-sky-700 hover:text-sky-400'>GovMail Administration Form</a> signed by the Head of the Agency, Chief Information Officer, or MIS head.</li>
                        <br>
                    </ul>
                    <li>The requesting agency shall wait for the validation and account provisioning process.</li>
                    <br>
                    <li>The GovMail team will coordinate with the requesting agency for any updates and configuration regarding their application.</li>
                    <br>
                    <li>The requesting agency should coordinate with the DICT GovMail team once their MX Record and TXT have been pointed to GovMail by their DNS hosting provider.</li>
                    <br>
                    <li>Provisioned accounts will be prepared to be officially transmitted and delivered to the agency via messenger and/or email.</li>
                    <br>
                    <li>The requesting agency will coordinate with the GovMail team to set a schedule for the conduct of user’s training and administration training.</li>
                </ol>
        <br>
        <p>For concerns and other inquiries, please send an email to <a href = "mailto: govmailsupport@dict.gov.ph" class = 'text-sky-700 hover:text-sky-400'>govmailsupport@dict.gov.ph</a>.</p>
        <br>

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
                            <a href="http://op-proper.gov.ph/" class = 'hover:text-sky-500'>Office of the President</a>
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