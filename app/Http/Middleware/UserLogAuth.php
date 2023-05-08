<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserLogAuth {

    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user')) {
            return redirect('/user/login');
        }

        return $next($request);
    }
}
