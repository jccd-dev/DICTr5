<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminRoleCheck
{

    public function handle(Request $request, Closure $next, ...$roles){

        if (Auth::check()) {
            // User is authenticated, retrieve the authenticated user
            $user = Auth::user();
            // Access the 'role' property
            $adminRole = (int)$user->role;

            // Convert the roles array to integers
            $allowedRoles = array_map('intval', $roles);

            if(!in_array(strval($adminRole), $allowedRoles)){
                return redirect()->back()->withErrors(['error' => 'You cannot access this function']);
            }

            return $next($request);

        }

        return redirect('/admin/login');

    }
}
