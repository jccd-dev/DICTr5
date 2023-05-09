<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    /**
     * @description use to remove the cookie and invalidate the token in jwt when log out
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function logout(){
        // get the forgotten cookie
        $cookie = Cookie::forget('jwt_token');

        try {
            JWTAuth::invalidate($cookie);
        } catch (JWTException $e) {
            // Handle the exception if needed
        }

        // destroy session
        session()->forget('admin_id');
        session()->forget('admin_role');
        return redirect('/admin/login')->withCookie($cookie);
    }

    public function test(){
        return json_encode(['user' => Auth::user()]);
    }
}
