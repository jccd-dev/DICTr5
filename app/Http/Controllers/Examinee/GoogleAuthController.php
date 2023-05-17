<?php

namespace App\Http\Controllers\Examinee;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\Examinee\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $user = Socialite::driver('google')->stateless()->user();

        $email = $user->getEmail();
        $fname = $user->offsetGet('given_name');
        $lname = $user->offsetGet('family_name');
        $google_id = $user->getId();
        $avatar = $user->getAvatar();

        $account = Users::where('google_id', $google_id)->first();
        if(!$account){
            $createdAcc = Users::create([
                'google_id' => $google_id,
                'email' => $email,
                'fname' => $fname,
                'lname' => $lname
            ]);

            Session::put('user', ['id' => $createdAcc->id, 'fname' => $fname, 'lname' => $lname]);
        }else{
            Session::put('user', ['id' => $account->id, 'fname' => $fname, 'lname' => $lname]);
        }
        return redirect()->route('user.dashboard');
    }

    public function user_login(){
        return view("layouts.examinee.user-login");
    }
}
