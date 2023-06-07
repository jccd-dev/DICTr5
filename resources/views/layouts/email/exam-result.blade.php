<body style="color: black">
{{--    <img src="http://drive.google.com/uc?export=view&id=1XmXmKLsUVakbhAn74iv_k-NmZcb7_7AV" style="width: 300px">--}}
{{--    <img src="{{$message->embed(public_path('img/DICTStandardLogos05.png'))}}" style="width: 300px">--}}
    <h2 style="">DICT Camarines Sur</h2>
    <h3 style="">Programming</h3>
    <p>Name: <b>{{$data['name']}}</b></p>
    <p>Exam Venue: <b>{{$data['venue']}}</b></p>
    @if($passed)
        <p>
            We are pleased to inform you that based on the result of the Diagnostic Examination conducted last
            <b>{{$data['exam_sched']}}</b>, you are qualified to take the ICT Proficiency Certification Examination. In view of this,
            our Field Operations Office focal person will contact you for additional information regarding said examination.
            For inquiries, kindly contact Mr./Ms./Engr. Ma. Peñafrancia Nepomuceno through
            <b>pinky.nepomuceno@dict.gov.ph</b>.
        </p>
    @else
        <p>
            We regret to inform you that based on the results of the Diagnostic Examination conducted last
            <b>{{$data['exam_sched']}}</b>, you are not qualified to take the ICT Proficiency Certification Examination.
        </p>
        <p>Your scores are as follows:</p>
        <div style="padding-left: 50px">
            <table>
                <tr>
                    <td style="padding-left:10px; padding-right:10px">Part I (Multiple Choice)</td>
                    <td style="padding-left:10px; padding-right:10px">:</td>
                    <td style="padding-left:10px; padding-right:10px">{{$data['part1']}}%</td>
                </tr>
                <tr>
                    <td style="padding-left:10px; padding-right:10px">Part II (Program Simulation)</td>
                    <td style="padding-left:10px; padding-right:10px">:</td>
                    <td style="padding-left:10px; padding-right:10px">{{$data['part2']}}%</td>
                </tr>
                <tr>
                    <td style="padding-left:10px; padding-right:10px">Part III (Mini-Programming)</td>
                    <td style="padding-left:10px; padding-right:10px">:</td>
                    <td style="padding-left:10px; padding-right:10px">{{$data['part3']}}%</td>
                </tr>
            </table>
        </div>
        <p>In view of this, we recommend that you undergo further training and/or practice on the following areas:</p>
        <div style="padding-left: 50px">
            <ol>
                <li>Program Simulation</li>
                <li>Number System</li>
                <li>Data Structure</li>
                <li>System Development Life Cycle</li>
                <li>Object Oriented Programming Concepts</li>
                <li>Networking Concepts</li>
                <li>File Access Methods</li>
                <li>Database Concepts</li>
            </ol>
        </div>
        <p>You may undergo another Diagnostic Examination with us as soon as you are ready.</p>
        <p>For inquiries, kindly contact Mr. Ralph Spencer Talagtag through <b>ralph.talagtag@dict.gov.ph</b>.</p>
    @endif
</body>
