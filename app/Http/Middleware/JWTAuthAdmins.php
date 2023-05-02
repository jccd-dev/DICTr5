<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as LaravelAuthenticate;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthAdmins extends LaravelAuthenticate
{
    public function handle($request, Closure $next, ...$guards){
        // get the token from the cookie if token not found redirect to log in or previous page
        $token = $request->cookie('jwt_token');
        if (!$token) {
            return redirect('/admin/login');
        }

        // Authenticate the extracted token then store it in $user var
        try {
            $user = JWTAuth::setToken($token)->authenticate();
        } catch (JWTException $e) {
            return redirect('/admin/login');
        }

        // if user is null redirect to login page again
        if (!$user) {
            return redirect('/admin/login');
        }

        // receives a user instance as its argument, After logging in the user
        // Laravel considers them authenticated
        Auth::login($user);

        return $next($request);

    }
}
