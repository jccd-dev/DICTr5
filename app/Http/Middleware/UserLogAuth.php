<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserLogAuth {

    public function handle(Request $request, Closure $next)
    {
        // check if user session is already set else return to login page
        if (!Session::has('user')) {
            return redirect('/exam/login');
        }

        return $next($request);
    }
}
