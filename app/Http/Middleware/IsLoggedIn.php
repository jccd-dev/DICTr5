<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as LaravelAuthenticate;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class IsLoggedIn extends LaravelAuthenticate
{
    public function handle($request, Closure $next, ...$guards){
        //get token
        $token = $request->cookie('jwt_token');

        try{
            $isAdmin = JWTAuth::setToken($token)->authenticate();
            if($isAdmin){
                //if admin is already authenticate then back to dashboard
                return redirect()->back();
            }
        }
        catch (JWTException $e){

        }

        return $next($request);
    }
}
