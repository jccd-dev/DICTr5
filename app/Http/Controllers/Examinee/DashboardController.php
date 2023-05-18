<?php

// TEMPORARY - for Testing only

namespace App\Http\Controllers\Examinee;

use App\Http\Controllers\Controller;
use App\Mail\EmailAdminAccount;
use App\Models\Examinee\UsersData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;

class DashboardController extends Controller
{
    public function dashboard(){
//        dd(session()->get('user'));
        return view('layouts.examinee.dashboard');
    }

    public function sendEmail(){
        $data = [
            'email' => 'cquelonio@gmail.com',
            'password' => 'Qwerty123'
        ];
//         Mail::to('cquelonio@gmail.com')->send(new EmailAdminAccount($data));
        // initiate FPDI
        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', '5');

        $path = public_path('/format/successformat.pdf');

        $pdf->setSourceFile($path);
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId, null, null, null, 210, true);

        // Passport Size
        $pdf->Image(storage_path('app/public/fileSubmits/Quelonio_passport_2305171684300803.jpg'), 116, 13, 20, 26);

        // Retaker
        $pdf->Image(public_path('img/checkmark.png'), 126, 45, 2, 0);

        //Name:
        $pdf->SetXY(10, 64);
        $pdf->Write(0.1, "QUELONIO CHRISTIAN ESTRADA");

        //Telephone Number
        $pdf->SetXY(115, 64);
        $pdf->Write(0.1, "09672447825");

        // Complete Address
        $pdf->SetXY(10, 70);
        $pdf->Write(0.1, "NEW SAN RQOUE, PILI, CAMARINES SUR");

        // Email Address
        $pdf->SetXY(103, 70);
        $pdf->Write(0.1, "chrquelonio@gmail.com");

        // Place of Birth
        $pdf->SetXY(10, 76);
        $pdf->Write(0.1, "NAGA CITY, CAMARINES SUR");

        // Date of Birth
        $pdf->SetXY(55, 76);
        $pdf->Write(0.1, "Nov. 19, 2000");

        //Gender
        $pdf->SetXY(89, 76);
        $pdf->Write(0.1, "M");

        // Citizenship
        $pdf->SetXY(107, 76);
        $pdf->Write(0.1, "FILIPINO");

        // Single
        $pdf->SetXY(124, 76);
        $pdf->Write(0.1, "SINGLE");

        // $pdf->SetFont('helvetica', 'B', '3'); // For more than 60 characters
        // COLLEGIATE/TERTIARY EDUCATION

        // UNIVERSITY / SCHOOL ATTENDED
        $pdf->SetXY(9, 89);
        $pdf->Write(0.1, "CENTRAL BICOL STATE UNIVERSITY OF AGRICULTURE");

        // Degree Earned
        $pdf->SetXY(71, 89);
        $pdf->Write(0.1, "BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY");

        // Inclusive years
        $pdf->SetXY(134, 89);
        $pdf->Write(0.1, "5");

        // IT TRAININGS / SEMINARS

        // 1
        // COURSE / SEMINAR
        $pdf->SetXY(9, 112);
        $pdf->Write(0.1, "Game Development and Career Opportunities");
        // TRAINING CENTER
        $pdf->SetXY(71, 112);
        $pdf->Write(0.1, "Department of Information and Communications Technology Office");
        // Training Hours
        $pdf->SetXY(132, 112);
        $pdf->Write(0.1, "5");

        // 2
        // COURSE / SEMINAR
        $pdf->SetXY(9, 116);
        $pdf->Write(0.1, "Game Development and Career Opportunities");
        // TRAINING CENTER
        $pdf->SetXY(71, 116);
        $pdf->Write(0.1, "Department of Information and Communications Technology Office");
        // Training Hours
        $pdf->SetXY(132, 116);
        $pdf->Write(0.1, "10");

        // 3
        // COURSE / SEMINAR
        $pdf->SetXY(9, 120);
        $pdf->Write(0.1, "Game Development and Career Opportunities");
        // TRAINING CENTER
        $pdf->SetXY(71, 120);
        $pdf->Write(0.1, "Department of Information and Communications Technology Office");
        // Training Hours
        $pdf->SetXY(132, 120);
        $pdf->Write(0.1, "10");

        // Present Office
        $pdf->SetXY(9, 131);
        $pdf->Write(0.1, "Department of Information and Communications Technology Region 5 Camarines Sur");

        // Telephone Number
        $pdf->SetXY(110, 131);
        $pdf->Write(0.1, "(054) 986 9993");

        // Office Address
        $pdf->SetXY(9, 137);
        $pdf->Write(0.1, "Camaligan, Camarines Sur");

        // Office Category
        // Government
        $pdf->Image(public_path('img/checkmark.png'), 111, 137, 1.5, 0);
        // Private
        $pdf->Image(public_path('img/checkmark.png'), 123, 137, 1.5, 0);

        // Visual Basic 6.0
        $pdf->Image(public_path('img/checkmark.png'), 11, 150, 1.5, 0);
        // VB Net
        $pdf->Image(public_path('img/checkmark.png'), 11, 154, 1.5, 0);
        // C++
        $pdf->Image(public_path('img/checkmark.png'), 43, 150, 1.5, 0);
        // C#
        $pdf->Image(public_path('img/checkmark.png'), 43, 154, 1.5, 0);
        // C Language
        $pdf->Image(public_path('img/checkmark.png'), 66, 150, 1.5, 0);
        // Java
        $pdf->Image(public_path('img/checkmark.png'), 66, 154, 1.5, 0);

        // Date Accomplished
        $pdf->SetXY(110, 185);
        $pdf->Write(0.1, date('F d, Y'));

        $user = UsersData::where('user_login_id', session()->get('user')['id'])->first();
        // Decode the base64 string and save it as an image file
        $data = substr($user->e_sign, strpos($user->e_sign, ',') + 1);
        $signatureImage = base64_decode($data);
        $signatureImagePath = storage_path('app/public/signature.png');
        file_put_contents($signatureImagePath, $signatureImage);

        // Signature
        $pdf->Image($signatureImagePath, 30, 174, 50, 0);

//        $pdf->SetXY(10, 130);
//        $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
//        $pdf->MultiCell(0, 4, $text);


        $pdf->Output('I', 'DemoTest.pdf');
//        return view('layouts.email.passed');
    }
}
