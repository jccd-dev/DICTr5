<?php

// TEMPORARY - for Testing only

namespace App\Http\Controllers\Examinee;

use App\Http\Controllers\Controller;
use App\Mail\EmailUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function dashboard(){
//        dd(session()->get('user'));
        return view('layouts.examinee.dashboard');
    }

    public function sendEmail(){
//         Mail::to('airezbustamante@gmail.com')->send(new EmailUsers());
        return view('layouts.email.passed');
    }
}
