<body style="padding-left: 30px; padding-right: 30px; font-size: 20px">
    <div style="padding: 5px; background-color: #edf2f7; border-radius: 5px;">
        <p style="padding-right: 20px; padding-left: 20px">
            Hi {{$data['first_name']}},
        </p>
        <p style="padding-right: 20px; padding-left: 20px">
            This is to inform you that your ICT Proficiency Diagnostic Exam is scheduled on <b> {{date('F d, Y', strtotime($data['exam_start_date']))}} from {{date('H:m A', strtotime($data['exam_start_date']))}} - {{date('H:m A', strtotime($data['exam_end_date']))}}. </b>
            Don't forget to bring the following:
        </p>
        <ol style="margin-left: 40px">
            <li>Black Ballpen</li>
            <li>Passport Size Picture</li>
            <li>Application Form</li>
        </ol>
        <p style="padding-right: 20px; padding-left: 20px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p style="padding-right: 20px; padding-left: 20px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>

</body>
