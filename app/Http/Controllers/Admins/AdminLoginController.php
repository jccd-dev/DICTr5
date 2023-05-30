<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Routing\Redirector;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Contracts\Foundation\Application;

class AdminLoginController extends Controller
{

    private string $cache_key = 'search_items';
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
        Cache::forget($this->cache_key);
        return redirect('/admin/login')->withCookie($cookie);
    }

    public function test(){
        return json_encode(['user' => Auth::user()]);
    }
}
