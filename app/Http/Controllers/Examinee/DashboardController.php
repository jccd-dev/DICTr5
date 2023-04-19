<?php

namespace App\Http\Controllers\Examinee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard(){
        dd(session()->get('user'));
        return view('layouts.examinee.dashboard');
    }
}
