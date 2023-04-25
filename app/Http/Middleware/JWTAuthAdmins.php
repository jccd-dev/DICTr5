<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as LaravelAuthenticate;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class JWTAuthAdmins extends LaravelAuthenticate
{
    public function handle($request, Closure $next, ...$guards){

        try {
            $admins = JWTAuth::parseToken()->authenticate();
        }catch (JWTException $e){
            return redirect('/admin/login');
        }catch (Exception $e){
            // do nothing for now
        }

        //if admin is already logged in
        if (Auth::guard('jwt')->check()) {
            return redirect('admin/dashboard');
        }

        if(!$admins) {
            return redirect('/admin/login');
        }

        Auth::guard('jwt')->setUser($admins);
        return $next($request);
    }
}
