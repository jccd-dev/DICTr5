<?php

// TEMPORARY - for Testing only

namespace App\Http\Controllers\Examinee;

use App\Http\Controllers\Controller;
use App\Mail\EmailAdminAccount;
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

        $pdf->Image(public_path('img.jpg'), 116, 13, 20, 26);
        $pdf->SetXY(10, 64);
        $pdf->Write(0.1, "QUELONIO, CHRISTIAN Estrada.");

        $pdf->SetXY(115, 64);
        $pdf->Write(0.1, "09672447825");

        $pdf->SetXY(10, 70);
        $pdf->Write(0.1, "NEW SAN RQOUE, PILI, CAMARINES SUR");

        $pdf->SetXY(103, 70);
        $pdf->Write(0.1, "chrquelonio@gmail.com");

        $pdf->SetXY(10, 76);
        $pdf->Write(0.1, "NAGA CITY, CAMARINES SUR");

        $pdf->SetXY(55, 76);
        $pdf->Write(0.1, "Nov. 19, 2000");

        $pdf->SetXY(89, 76);
        $pdf->Write(0.1, "M");

        $pdf->SetXY(107, 76);
        $pdf->Write(0.1, "FILIPINO");

        $pdf->SetXY(124, 76);
        $pdf->Write(0.1, "SINGLE");

        $pdf->SetFont('helvetica', 'B', '8');
        // Visual Basic
        // $pdf->SetXY(10, 147);
        $pdf->SetXY(9, 147);
        $pdf->Write(0.1, " / ");

//        $pdf->SetXY(10, 130);
//        $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
//        $pdf->MultiCell(0, 4, $text);


        $pdf->Output('I', 'DemoTest.pdf');
//        return view('layouts.email.passed');
    }
}
