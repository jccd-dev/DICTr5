<body style="padding: 5px;">
    <div style="background-color: #00296B; padding: 10px; text-align: center; border-radius: 15px">
        <img src="http://drive.google.com/uc?export=view&id=1EraE3XGC1fiwunSWciacvVSCTcOPCHty" style="width: 200px">
        <h2 style="color:white">DICT Camarines Sur</h2>
        <p style="color:white; padding-left: 50px; padding-right: 50px;">This is to inform you that your Application status for the ICT Proficiency Diagnostic Exam has been carefully reviewed and processed. Your application status has been </p>
        <br>
        <div style="padding-left: 50px; padding-right: 50px;">
            <div style="font-size: 40px; font-weight: bold; text-align: center; background-color: #FFD500; color: #373737; border-radius:20px; padding: 15px;">
                @if($status == 1)
                    REJECTED
                @elseif($status == 2)
                    INCOMPLETE REQUIREMENTS
                @elseif($status == 4)
                    APPROVED
                @endif
            </div>
            @if($status == 1)
                <p style="color:white;">{{$data['remark']}}</p>
            @elseif($status == 2)
                <p style="color:white;">{{$data['remark']}}</p>
            @elseif($status == 4)
                <p style="color:white;"></p>
            @endif

            <p style="color:white;"> If you have concerns you may contact us at <b><i>ralph.talagtag@dict.gov.ph</i></b></p>
        </div>
    </div>
</body>
