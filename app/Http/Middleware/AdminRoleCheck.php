<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminRoleCheck
{
    public function handle(Request $request, Closure $next, ...$roles){

        // get the token from the cookie
        $token = $request->cookie('jwt_token');

        try {
            // parse the token into authorization header
            $admin = JWTAuth::parseToken($token)->authenticate();
        }catch (JWTException $e){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if(!in_array($admin->role, $roles)){
            return response()->json(['error' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
