<?php

namespace App\Http\Controllers;

use App\Models\Examinee\UsersData;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class UserDataController extends Controller
{
    public function generateILCDBForm(Request $request){
        $data = $request->data;
//        dd($data);

        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', '5');

        $path = public_path('/format/successformat.pdf');

        $pdf->setSourceFile($path);
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId, null, null, null, 210, true);

        // Passport Size
        if(array_key_exists('passport', $data)){
            $pdf->Image(storage_path('app/public/fileSubmits/'.$data['passport']), 119, 25, 20, 26);
        }

        if($data['is_retaker'] == 'no'){
            // First Time
            $pdf->Image(public_path('img/checkmark.png'), 102, 46, 2, 0);
        }else{
            // Retake
            $pdf->Image(public_path('img/checkmark.png'), 102, 40, 2, 0);
        }

        //Name:
        $pdf->SetXY(10, 63);
        $pdf->Write(0.1, $data['lname'].', '.$data['fname'].' '.$data['mname']);

        //Telephone Number
        $pdf->SetXY(115, 63);
        $pdf->Write(0.1, $data['contact_number']);

        // Complete Address
        $pdf->SetXY(10, 69);
        $pdf->Write(0.1, $data['barangay'].', '.$data['municipality'].', '.$data['province'].', '.$data['region']);

        // Email Address
        $pdf->SetXY(103, 69);
        $pdf->Write(0.1, $data['email']);

        // Place of Birth
        $pdf->SetXY(10, 75);
        $pdf->Write(0.1, $data['place_of_birth']);

        // Date of Birth
        $pdf->SetXY(55, 75);
        $pdf->Write(0.1, $data['date_of_birth']);

        //Gender
        $pdf->SetXY(89, 75);
        if($data['gender'] == 'male'){
            $pdf->Write(0.1, "Male");
        }else{
            $pdf->Write(0.1, "Female");
        }

        // Citizenship
        $pdf->SetXY(107, 75);
        $pdf->Write(0.1, $data['citizenship']);

        // Civil Status
        $civil_status = ''.$data['civil_status'];
        $pdf->SetXY(124, 75);
        $pdf->Write(0.1, strtoupper($civil_status));

        // $pdf->SetFont('helvetica', 'B', '3'); // For more than 60 characters
        // COLLEGIATE/TERTIARY EDUCATION

        // UNIVERSITY / SCHOOL ATTENDED
        $pdf->SetXY(9, 88);
        $pdf->Write(0.1, $data['school_attended']);

        // Degree Earned
        $pdf->SetXY(71, 88);
        $pdf->Write(0.1, $data['degree']);

        // Inclusive years
        $pdf->SetXY(133, 88);
        $pdf->Write(0.1, $data['inclusive_years']);

        // Those N/A in Tertiary Education
        $pdf->SetXY(9, 92);
        $pdf->Write(0.1, 'N/A');
        $pdf->SetXY(71, 92);
        $pdf->Write(0.1, 'N/A');
        $pdf->SetXY(130, 92);
        $pdf->Write(0.1, 'N/A');

        $pdf->SetXY(9, 97);
        $pdf->Write(0.1, 'N/A');
        $pdf->SetXY(71, 97);
        $pdf->Write(0.1, 'N/A');
        $pdf->SetXY(130, 97);
        $pdf->Write(0.1, 'N/A');

        // IT TRAININGS / SEMINARS
        if($data['training_seminar'] != null){
            if(count($data['training_seminar']) > 1){
                // 1
                // COURSE / SEMINAR
                $pdf->SetXY(9, 112);
                $pdf->Write(0.1, $data['training_seminar'][0]['course']);
                // TRAINING CENTER
                $pdf->SetXY(71, 112);
                $pdf->Write(0.1, $data['training_seminar'][0]['center']);
                // Training Hours
                $pdf->SetXY(132, 112);
                $pdf->Write(0.1, $data['training_seminar'][0]['hours']);

                // 2
                // COURSE / SEMINAR
                $pdf->SetXY(9, 116);
                $pdf->Write(0.1, $data['training_seminar'][1]['course']);
                // TRAINING CENTER
                $pdf->SetXY(71, 116);
                $pdf->Write(0.1, $data['training_seminar'][1]['center']);
                // Training Hours
                $pdf->SetXY(132, 116);
                $pdf->Write(0.1, $data['training_seminar'][1]['hours']);
            }else{
                // 1
                // COURSE / SEMINAR
                $pdf->SetXY(9, 112);
                $pdf->Write(0.1, $data['training_seminar'][0]['course']);
                // TRAINING CENTER
                $pdf->SetXY(71, 112);
                $pdf->Write(0.1, $data['training_seminar'][0]['center']);
                // Training Hours
                $pdf->SetXY(132, 112);
                $pdf->Write(0.1, $data['training_seminar'][0]['hours']);

                // 2
                // COURSE / SEMINAR
                $pdf->SetXY(9, 116);
                $pdf->Write(0.1, 'N/A');
                // TRAINING CENTER
                $pdf->SetXY(71, 116);
                $pdf->Write(0.1, 'N/A');
                // Training Hours
                $pdf->SetXY(132, 116);
                $pdf->Write(0.1, 'N/A');
            }
        }else{
            // 1
            // COURSE / SEMINAR
            $pdf->SetXY(9, 112);
            $pdf->Write(0.1, 'N/A');
            // TRAINING CENTER
            $pdf->SetXY(71, 112);
            $pdf->Write(0.1, 'N/A');
            // Training Hours
            $pdf->SetXY(132, 112);
            $pdf->Write(0.1, 'N/A');

            // 2
            // COURSE / SEMINAR
            $pdf->SetXY(9, 116);
            $pdf->Write(0.1, 'N/A');
            // TRAINING CENTER
            $pdf->SetXY(71, 116);
            $pdf->Write(0.1, 'N/A');
            // Training Hours
            $pdf->SetXY(132, 116);
            $pdf->Write(0.1, 'N/A');
        }

        // Present Office
        $pdf->SetXY(9, 126);
        if($data['present_office'] == null || $data['present_office'] == ''){
            $pdf->Write(0.1, 'N/A');
        }else{
            $pdf->Write(0.1, $data['present_office']);
        }

        // Telephone Number
        $pdf->SetXY(110, 126);
        if($data['telephone_number'] == 0 || $data['telephone_number'] == null){
            $pdf->Write(0.1, 'N/A');
        }else{
            $pdf->Write(0.1, $data['telephone_number']);
        }

        // Office Address
        $pdf->SetXY(9, 132);
        if($data['office_address'] == null || $data['office_address'] == ''){
            $pdf->Write(0.1, 'N/A');
        }else{
            $pdf->Write(0.1, $data['office_address']);
        }

        // Office Category
        if($data['office_category'] == 'government'){
            // Government
            $pdf->Image(public_path('img/checkmark.png'), 111, 132, 1.5, 0);
        }elseif($data['office_category'] == 'Private'){
            // Private
            $pdf->Image(public_path('img/checkmark.png'), 123, 132, 1.5, 0);
        }

        // Designation
        $pdf->SetXY(9, 139);
        if($data['designation'] == null || $data['designation'] == ''){
            $pdf->Write(0.1, "N/A");
        }else{
            $pdf->Write(0.1, $data['designation']);
        }

        // No. of Years in present position
        $pdf->SetXY(99, 139);
        if($data['no_of_years_in_pos'] == null || $data['no_of_years_in_pos'] == ''){
            $pdf->Write(0.1, "N/A");
        }else{
            $pdf->Write(0.1, $data['no_of_years_in_pos']);
        }

        switch ($data['programming_langs']){
            case 'Visual Basic 6.0':
                // Visual Basic 6.0
                $pdf->Image(public_path('img/checkmark.png'), 11, 145, 1.5, 0);
                break;
            case 'VB.NET':
                // VB Net
                $pdf->Image(public_path('img/checkmark.png'), 11, 149, 1.5, 0);
                break;
            case 'c++':
                // C++
                $pdf->Image(public_path('img/checkmark.png'), 43, 145, 1.5, 0);
                break;
            case 'C#':
                // C#
                $pdf->Image(public_path('img/checkmark.png'), 43, 149, 1.5, 0);
                break;
            case 'C Language':
                // C Language
                $pdf->Image(public_path('img/checkmark.png'), 66, 145, 1.5, 0);
                break;
            case 'Java':
                // Java
                $pdf->Image(public_path('img/checkmark.png'), 66, 149, 1.5, 0);
                break;
        }

        // Additional Information
        $add_info = $data['add_info'];
        $decoded_add_info = json_decode($add_info);
        if(in_array('PWD', $decoded_add_info)){
            // PWD
            $pdf->Image(public_path('img/checkmark.png'), 45, 156, 1.5, 0);
        }elseif(in_array('Senior Citizen', $decoded_add_info)){
            // Senior Citizen
            $pdf->Image(public_path('img/checkmark.png'), 58, 156, 1.5, 0);
        }elseif(in_array('Solo Parent', $decoded_add_info)){
            // Solo Parent
            $pdf->Image(public_path('img/checkmark.png'), 78, 156, 1.5, 0);
        }elseif(in_array('Member of an IP Group', $decoded_add_info)){
            // Member of an IP Group
            $pdf->Image(public_path('img/checkmark.png'), 94, 156, 1.5, 0);
        }

        // Date Accomplished
        $pdf->SetXY(110, 185);
        $pdf->Write(0.1, date('F d, Y', strtotime($data['date_accomplish'])));

        // Decode the base64 string and save it as an image file
        $signature = substr($data['e_sign'], strpos($data['e_sign'], ',') + 1);
        $signatureImage = base64_decode($signature);
        $signatureImagePath = storage_path('app/public/signature.png');
        file_put_contents($signatureImagePath, $signatureImage);

        // Signature
        $pdf->Image($signatureImagePath, 33, 182, 25, 0);

//        $pdf->SetXY(10, 130);
//        $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
//        $pdf->MultiCell(0, 4, $text);

        $filename = $data['lname'].'_ApplicationForm.pdf';
        $pdf->Output('I', $filename);

    }
}
