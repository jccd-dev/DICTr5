<body>
    <p>{{$data['name']}},</p>
    <p>
        The attached document is your Transscript Record from {{date('F Y', strtotime($data['exam_schedule']))}} ICT Proficiency Diagnostic Exam.
    </p>
    <p>
        Thank you!
    </p>
</body>
