@extends('layouts.main-layout')

@section('content')

<x-layouts.top-banner />

<x-layouts.banner />

<x-layouts.navbar />

<div class = 'justify-center'>
    <div class = 'flex-col px-4 py-8'>
    <h1 class = 'text-3xl font-bold'>Government Video Conferencing Service (GVCS)</h1>
    </div>
    
    <hr>

    <div class = 'p-4'>
        <p>Government Video Conferencing Service (GVCS) is a technology that provides
         video telephony and online chat services through a cloud-based software platform and
         is used for teleconferencing, telecommuting, distance education, and social relations. 
         It allows users to hold live, visual connections from different locations for the purpose of 
         communication. This service is convenient for government agencies and other institutions 
         because it can be used to hold meetings that may be one-to-one, one-to-group, or group-to-group.</p>
        <br>
        <p>Aside from making real-time long-distance “face-to-face” communication possible, 
            the tangible benefits of Government Video Conferencing Service (GVCS) include saving 
            time and convenience to workforces  as we adjust to the ‘new normal’ environment.</p>
        <br>
        <p>As the ‘new normal’ requires heavy reliance on technology, we offer the use of Government 
        Video Conferencing Service (GVCS), a video and web conferencing software provided by DICT for 
        the Government of the Philippines. This is one of the solutions that is readily available to 
        ensure the continuity of operations and transactions while working remotely.</p>
        <br>
        <p>The Government Video Conferencing Service (GVCS) offers:</p>
        <br>
        <ul class = 'list-disc pl-9'>
            <li><b>High Definition</b> video for face-to-face meetingts and flexible audio-only conference call options</li>
            <li><b>Large Meeting Capacity:</b> can host meetings with unlimited minutes uo to 300 participants.</li>
            <li><b>Multi-Sharing:</b> multiple participants can share their screens simultaneously during a meeting. This can be useful for a real-time comparison
            of documents or other materials by participants.</li>
            <li><b>Virtual Background:</b> set a new background in your meetings 
            to hide clutter, eliminate distractions, or highlight branding.</li>
            <li><b>Waiting Room:</b> security feature that allows the host to control participants
            who want to join the meeting.</li>
            <li><b>Breakout rooms:</b> allow you to split your meeeting in up to 50 separate session.</li>
            <li><b>Calendar Integration:</b> seamless joining by using free Scheduler Extension or Plug-In for your existing calendaring system.</li>
        </ul>
        <br>
        <h2 class = 'font-bold text-base'>GUIDELINES ON THE USE OF GOVERNMENT VIDEO CONFERENCING SERVICE (GVCS)</h2>
        <br>
        <ol class = 'list-decimal pl-9'>
            <li>Government Video Conferencing Service (GVCS) shall provide service to all National Government Agencies (NGAs), Local Government Units (LGUs), Government-Owned and Controlled Corporations (GOCCs), and Government Financial Institutions (GFIs) that wish to host web conferences, meetings and webinars.</li>
            <li>DICT will be the one to create the meeting based on the details submitted by the requesting agency.</li>
            <li>DICT will send the meeting details including the link and password to the designated technical person for proper dissemination. Only share the information to designated attendees.</li>
            <li>Meetings may be started earlier than scheduled upon request. This shall include “subject for approval” as such will still be under approval or availability of the slot requested. Regardless, meeting links are open at least 30 minutes before the scheduled time.</li>
            <li>Once the meeting has started, DICT will transfer to the assigned technical person and he/she will have full control of the meeting.</li>
            <li>The technical person has the option to lock the meeting and scan attendees before letting them in the meeting room.</li>
            <li>The technical person has the option to record the proceedings. Recording must be saved on the technical person’s computer. <b>Cloud-based recording is not allowed for security reasons.</b></li>
        </ol>
        <br>
        <h2 class = 'font-bold text-base'>MINIMUM OPERATING REQUIREMENTS</h2>
        <br>
        <div class = 'pl-3'>
        <p>1) Computer or Mobile Devices, such as phone and tablet</p>
        <br>
        <p>You may download a desktop application to your computer through this link: https://zoom.us/support/download or you can still join meetings using the web application instead. Mobile application is also readily available for download on your smartphone.</p>
        <br>
        <p>2) Stable Internet Connection</p>
        <br>
        <p>3) Designated technical support</p>
        </div>
        <br>
        <h2 class = 'font-bold text-base'>HOW TO REQUEST FOR A GOVERNMENT VIDEO CONFERENCING SERVICE (GVCS)</h2>
        <ol class = 'list-decimal p-6'>
            <li>Submit the request at least 2 days before the actual meeting by answering this Google Form: GVCS Form </li> 
        </ol>
        <p>The form consists of the following:</p>
        <ol class = 'list-decimal p-6'>
            <li>Agency</li>
            <li>Technical Person/Host (Full Name)</li>
            <li>.gov.ph Email Address (e.g. juandelacruz@dict.gov.ph)</li>
            <li>Designation/Position</li>
            <li>Mobile Number</li>
            <li>Meeting Description</li>
            <li>Meeting Date</li>
            <li>Meeting Time</li>
            <li>Length of Meeting</li>
            <li>Require registration for participants?</li>
        </ol>
        <br>
        <p>For more information, you can also email us at <a href = "mailto: gvcssupport@dict.gov.ph" class = 'hover:text-sky-500'>gvcssupport@dict.gov.ph.</a></p>
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